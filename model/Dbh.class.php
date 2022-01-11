<?php
Abstract class Dbh
{
    protected function connectToDatabase()
    {
        try {
            $pdo = new PDO(
                'mysql:host=localhost;
                                dbname=biblioDB;
                                charset=utf8;',
                "biblioAdmin",
                "r34db00k5",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            $pdo->query("SET autocommit=0");
            return $pdo;
        } catch (Exception $error) {
            die("Error : " . $error->getMessage());
        }
    }
}
