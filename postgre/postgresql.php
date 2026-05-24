<?php

require_once 'Connection.php';   // como está en la misma carpeta, ruta relativa directa

class QueryManager
{
    public function insert(PDO $dbh, string $table, int $q): void
    {
        $randomNames = [
            "products" => ["REMERA", "PANTALON", "CAMISA", "ZAPATOS", "CORBATA", "SACO"],
            "categories" => ["ZAPATOS", "PANTALONES", "TREN SUPERIOR"]
        ];
        $tables = ['products', 'categories'];

        if (!in_array($table, $tables)) {
            throw new Exception("Tabla no permitida");
        }

        for ($i = 0; $i < $q; $i++) {
            $name = $randomNames[$table][rand(0, count(array_values($randomNames[$table])) - 1)];
            $sql = "INSERT INTO $table (NAME) VALUES ('$name')";
            $stmt = $dbh->query($sql);
            $stmt->execute();
        }
    }

    public function createRecords(int $q, string $table): void
    {
        try {
            $connection = new Connection();
            $dbh = $connection->create();
            $this->insert($dbh, $table, $q);
            $tables = ['products', 'categories'];

            if (!in_array($table, $tables)) {
                throw new Exception("Tabla no permitida");
            }

            $sql = "SELECT * FROM $table";
            $stmt = $dbh->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($rows);
        } catch (PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}

$p = new QueryManager();
$p->createRecords(2, 'products');
