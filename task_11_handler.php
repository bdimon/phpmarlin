<?php 
session_start();
// var_dump($_POST); die;
$email = $_POST["email"];
$password = $_POST["password"];
$hash = password_hash($password, PASSWORD_DEFAULT);
$pdo = new PDO("mysql:host=localhost;dbname=marlin;", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$sql = "SELECT * FROM users WHERE email = ?";
$statement = $pdo->prepare($sql);
$statement->execute(array($email));
$res = $statement->fetch();
// var_dump($res); die;
if(!empty($res)){
	$message = "Такая почта уже существует!";
	$_SESSION['danger'] = $message;
	header('Location: /task_11.php');
	exit;
}

$sql = "INSERT  INTO users (email, password) VALUES (?, ?)";
$statement = $pdo->prepare($sql);

$statement->execute(array($email, $hash));

$message = "Данные успешно внесены!";
$_SESSION['success'] = $message;
header('Location: /task_11.php');
?>