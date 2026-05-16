<?php

$source = fopen('data.csv', 'r');
$destiny = fopen('data-2.csv', 'w');

if($source !== false && $destiny !== false) {
    $row = 0;
    $columns = [];

    while(($data = fgetcsv($source)) !== false) {
        fputcsv($destiny, $data);

        for ($i = 0; $i < count($data); $i++) {
            if ($row === 0){
                array_push($columns, $data[$i]);
                continue;
            }
            echo "$columns[$i]: $data[$i] \n";
        }
        echo "\n\n";
        $row++;
    }

    fclose($source);
    fclose($destiny);
}