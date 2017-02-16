<?php

namespace core;

use PDO;
use PDOException;

final class CoreApiFactory
{
    /**
     * @return PDO
     */
    public function getDatabase()
    {
        $host = "localhost";
        $dbname = "chat";
        $username = "root";
        $password = "";

        try {

            $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            die('DATABASE ERROR: ' . $e->getMessage());
        }

        return $dbh;
    }
}