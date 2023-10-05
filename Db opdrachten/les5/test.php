<?php
function db_connect($db, $name, $pass, $server): PDO
{
    $servername = $server;
    $username = $name;
    $password = $pass;
    $dbname = $db;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Fout bij het maken van de connection: " . $e->getMessage());
    }

    return $conn;
}