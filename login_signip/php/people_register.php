<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $moblie = $_POST['moblie'];
    $blood_grp = $_POST['blood_grp'];
    $user_type = 3;
    $pass = $_POST['pass'];

    // Prepare and execute the query for the 'users' table
    $stmt = $conn->prepare("INSERT INTO users (name, moblie, blood_grp, user_type, pass) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisis", $name, $moblie, $blood_grp, $user_type, $pass);
    $stmt->execute();
    $stmt->close();

    // Prepare and execute the query for the 'gps_track' table
    $stmt = $conn->prepare("INSERT INTO gps_track (rider_id) VALUES (?)");
    $stmt->bind_param("i", $moblie);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
