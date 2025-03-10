<?php
$servername = "sql308.infinityfree.com";
$username = "if0_38286518";
$password = "cwadmin123";
$dbname = "if0_38286518_cw";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>