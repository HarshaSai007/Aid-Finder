<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $a_name = $_POST['a_name'];
    // $a_id = $_POST['a_id'];
    $a_type = $_POST['a_type'];
    $a_moblie = $_POST['a_moblie'];
    $a_mail = $_POST['a_mail'];
    $a_pass = $_POST['a_pass'];
    $a_lat = $_POST['a_lat'];
    $a_lon = $_POST['a_lon'];

    $stmt = $conn->prepare("INSERT INTO agency (a_name, a_type, a_moblie, a_mail, a_pass, a_lat, a_lon) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siissdd", $a_name, $a_type, $a_moblie, $a_mail, $a_pass, $a_lat, $a_lon);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
