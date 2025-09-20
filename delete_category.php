<?php
require 'db_connect.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM Categories WHERE id = ?");
$stmt->execute([$id]);
header("Location: categories.php");
exit();
?>