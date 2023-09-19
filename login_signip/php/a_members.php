<?php

include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $moblie = $_POST['moblie'];
    $blood_grp = $_POST['blood_grp'];
    $user_type = 2;
    $pass = $_POST['pass'];



    try {
        $conn->begin_transaction();

        $sql = "INSERT INTO users (name, mobile, blood_grp, user_type, pass) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisis", $name, $mobile, $blood_grp, $user_type, $pass);
        $stmt->execute();
        $stmt->close();

        $sql1 = "INSERT INTO gps_track (rider_id) VALUES (?)";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $mobile);
        $stmt1->execute();
        $stmt1->close();

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
