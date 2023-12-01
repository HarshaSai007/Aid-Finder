<?php
include 'connect.php';
if (isset($_POST["a_id"])) {

    $a_id = $_POST['a_id'];

    $stmt = $con->prepare("UPDATE agencies SET reg_status = 1 WHERE a_id = ?");
    $stmt->bind_param("i", $a_id);
    $stmt->execute();
}
