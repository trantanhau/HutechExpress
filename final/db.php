<?php

$username = "root";
$password = "";
$db = "hutech";


$con = mysqli_connect('localhost', $username, $password,$db);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
