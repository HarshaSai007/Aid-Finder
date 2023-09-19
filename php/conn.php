<?php

$DB_HOST = "localhost";
$DB_NAME = "aid_finder";
$DB_CHARSET = "utf8mb4";
$DB_USER = "root";
$DB_PASSWORD = "";


$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

if (!$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME)) {
    die("Failed To Connect");
}
