<?php 
// var_dump($_POST);
$text = $_POST["text"];
$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "" );
$sql = "INSERT  INTO text (content) VALUES (:txt)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['txt' => $text]);
header('Location: /task_9.html');
?>