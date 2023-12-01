<?php

$con = new mysqli('localhost', 'root', '', 'aid_finder');

if (!$con) {
    die(mysqli_error($con));
}
