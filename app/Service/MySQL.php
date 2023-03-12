<?php

namespace App\Service;

require_once '../Configuration/Configuration.php';

use App\Configuration\Configuration;
use mysqli;
use mysqli_result;

class MySQL
{
    private mysqli $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(
            hostname: Configuration::MYSQL_HOSTNAME,
            username: Configuration::MYSQL_USERNAME,
            password: Configuration::MYSQL_PASSWORD,
            database: Configuration::MYSQL_DATABASE,
            port: Configuration::MYSQL_PORT
        );

        if ($this->mysqli->connect_error) {
            die('Connection failed: ' . $this->mysqli->connect_error);
        }
    }

    public function query(string $query): mysqli_result|bool|null
    {
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();

        return $stmt->get_result();
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
}