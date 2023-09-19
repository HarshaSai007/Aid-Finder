<?php

$DB_HOST = "localhost";
$DB_NAME = "aid_finder";
$DB_CHARSET = "utf8mb4";
$DB_USER = "root";
$DB_PASSWORD = "";


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Failed To Connect");
}
