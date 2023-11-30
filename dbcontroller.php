<?php

class DBController
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "inventory";
    private $conn;
    function __construct()
    {
        $this->conn = $this->connectDB();
    }
    function connectDB()
    {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
    function runQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultSet[] = $row;
        }
        if (!empty($resultSet)) {
            return $resultSet;
        }
    }
    function numRows($query)
    {
        $result = mysqli_query($this->conn, $query);
        $rowCount = mysqli_num_rows($result);
        return $rowCount;
    }
}
