<?php 
session_start();


if (isset($_POST["click"])) {
	$_SESSION['counter']++;
}

header('Location: /task_13.php');
?>