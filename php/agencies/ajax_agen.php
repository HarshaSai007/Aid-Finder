<?php
if (isset($_POST["req"])) {
    require "agencies_loc.php";
    switch ($_POST["req"]) {
        case "get":
            echo json_encode($_TRACK->get(isset($_POST["id"]) ? $_POST["id"] : null));
            break;
    }
}
