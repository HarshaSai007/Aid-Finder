<?php
if (isset($_POST["req"])) {
    require "php/agencies/agencies_loc.php";
    $lat = $_POST['lat'] ?? null;
    $lon = $_POST['lon'] ?? null;
    switch ($_POST["req"]) {
        case "get":
            echo json_encode($_TRACK->near_by($lat, $lon));
            break;
    }
}
