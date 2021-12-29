<?php
session_start();
// var_dump($_POST); //die;
$text = $_POST["text"];
$pdo = new PDO("mysql:host=localhost;dbname=php_lessons;", "root", "" );

$sql = "SELECT * FROM text WHERE content=:text";
$statement =$pdo->prepare($sql);
$statement->execute(['text' => $text]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
// var_dump($result); die;
if (!empty($result)) {
    $danger = "Вы ввели дубликат!";
    $_SESSION['danger'] = $danger;
    header("Location: /task_10.php");
    exit;
}

$sql = "INSERT  INTO text (content) VALUES (:text)";
$stmt = $pdo->prepare($sql);
$stmt->execute(["text" => $text]);
$success = "Данные внесены!";
$_SESSION['success'] = $success;
header('Location: /task_10.php');
// header('Refresh:3; url=https://www.php.net/manual/ru/function.header.php');
?>
