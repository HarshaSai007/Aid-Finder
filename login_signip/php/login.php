<?php

session_start();
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $moblie = $_POST['moblie'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE moblie=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $moblie);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $user_type = $row['user_type'];

        if ($pass == $row['pass'] && $user_type == '0') {
            $_SESSION['moblie'] = $moblie;
            header("#");
        } elseif ($pass == $row['pass'] && $user_type == '0' && $user_type == '1') {
            $_SESSION['moblie'] = $moblie;
            header("#");
        } elseif ($pass == $row['pass'] && $user_type == '2') {
            $_SESSION['moblie'] = $moblie;
            header("#");
        } elseif ($pass == $row['pass'] && $user_type == '3') {
            $_SESSION['moblie'] = $moblie;
            header("#");
        } else {
            $error_message = 1;
        }
    } else {
        $error_message = 2;
    }
}
