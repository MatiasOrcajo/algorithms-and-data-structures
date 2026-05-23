<?php

class Connection
{
    public function create(): PDO
    {
        return new PDO('pgsql:host=localhost;dbname=test', 'postgres', 'root', array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        ));
    }
}