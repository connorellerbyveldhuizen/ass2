<?php

function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=store3", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
