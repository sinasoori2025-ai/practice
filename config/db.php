<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "School Portal"; // یا school_portal

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>