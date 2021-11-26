<?php 
session_start();
$text = $_POST["text"];
$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "" );

$sql = "INSERT  INTO text (content) VALUES (:txt)";
$statement = $pdo->prepare($sql);
$statement->execute(['txt' => $text]);
$message = $text;
$_SESSION['success'] = $message;
header('Location: /task_12.php');
?>