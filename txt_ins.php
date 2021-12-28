<?php 
// var_dump($_POST);
$text = $_POST["text"];
$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "" );
$sql = "INSERT  INTO text (content) VALUES ('$text')";
$statement = $pdo->prepare($sql);
$statement->execute();
header('Location: /task_9.html');
?>
