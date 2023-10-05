<?php
include("test.php");

$envSettings = []; //env settings
if (file_exists(dirname(__FILE__).'/.env')) { //if /.env exist then
    $envSettings = parse_ini_file(dirname(__FILE__).'/.env'); //save /.env data in $envSettings
}

define("DB_NAME",$envSettings["DB_NAME"]);
define("DB_USER",$envSettings["DB_USER"]);
define("DB_PASSWORD",$envSettings["DB_PASSWORD"]);
define("DB_HOST",$envSettings["DB_HOST"]);

$connection = db_connect(DB_NAME, DB_USER, DB_PASSWORD, DB_HOST);

$stmt = $connection->prepare("SELECT * FROM bagage");

$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
    echo "bagagenummer: " . $row['bagageNummer'] . "<br>";
    echo "gewicht(kg): " . $row['gewicht'] . "<br>";
    echo "volume(m3): " . $row['volume'] . "<br><br>";
}