<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = $id";
$conn->query($sql);

header("Location: index.php");
?>