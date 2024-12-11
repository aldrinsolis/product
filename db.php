<?php
$servername = "if0_37892970_product_db";
$username = "if0_37892970";
$password = "solisaldrin23";
$dbname = "sql111.infinityfree.com";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
