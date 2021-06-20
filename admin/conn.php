<?php
    function conn()
    {
        $serverName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "movielens";
        $conn = mysqli_connect($serverName, $userName, $password, $dbName);
        return $conn;
    }
?>