<?php 
session_start();
$text = $_POST["text"];
$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "" );
$sql = "SELECT * FROM text WHERE content = :txt";
$statement = $pdo->prepare($sql);
$statement->execute(['txt' => $text]);
$res = $statement->fetch(PDO::FETCH_ASSOC);
// var_dump($res); die;
if(!empty($res)){
	$message = "Введенное значение уже существует!";
	$_SESSION['danger'] = $message;
	header('Location: /task_10.php');
	exit;
}

$sql = "INSERT  INTO text (content) VALUES (:txt)";
$statement = $pdo->prepare($sql);
$statement->execute(['txt' => $text]);
$message = "Данные успешно внесены!";
$_SESSION['success'] = $message;
header('Location: /task_10.php');
?>