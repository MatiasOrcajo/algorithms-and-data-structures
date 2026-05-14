<?php

class ProductManager
{
    private function createConnection(): PDO
    {
        return new PDO('pgsql:host=localhost;dbname=test', 'postgres', 'root', array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        ));
    }

    private function insert(PDO $dbh, int $q): void
    {
        $itemsNames = ["REMERA", "PANTALON", "CAMISA", "ZAPATOS", "CORBATA", "SACO"];
        $stmt = $dbh->prepare("INSERT INTO PRODUCTS (NAME)
                VALUES (:name)
            ");
        for ($i = 0; $i < $q; $i++) {
            $stmt->execute([':name' => $itemsNames[rand(0, count($itemsNames) - 1)]]);
        }
    }

    public function createRecords(int $q): void
    {
        try {
            $dbh = $this->createConnection();
            $this->insert($dbh, $q);

            $sth = $dbh->query('SELECT * FROM PRODUCTS');
            $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
            print_r($rows);
        } catch (PDOException $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}

$p = new ProductManager();
$p->createRecords(2);
