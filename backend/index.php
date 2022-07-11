<?php
session_start();
$pdo = require_once './data/database.php';

$stmt = $pdo->prepare('SELECT * FROM users');
$stmt->execute();
$users = $stmt->fetchAll();

$title = "Culin'air";
$error = "";

?>