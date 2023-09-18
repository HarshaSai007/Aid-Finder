<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "aid_finder";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Failed To Connect");
}
