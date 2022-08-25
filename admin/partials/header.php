<?php
require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');
session_start();// початок сесії



$is_session = isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null; // перемінна яка вказує, що сесія є і не пуста
$is_cookie = isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null; //перемінна яка вказує, що кукі є і не пусті

if( $is_session ||  $is_cookie) {// якщо одна з цих перемінних true виконується далі умова

	$userID = $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"]; // через тернанний оператор вирішуємо якщо true $is_session то глобальна перемінна записується в сесію інакше в кукі 

	$sql = "SELECT * FROM users WHERE id=" . $userID; // вибираємо де вибраний айді буде дорівнювати нашому айді через сесію. Тобто шукаємо по id
	$result = mysqli_query($conn, $sql);// виконання запросу
	$user = $result->fetch_assoc();// вивід всіх даних, а саме сесії
	
	if($user['role'] != "admin") { // якщо не ключ масива ['role'] не дорвнює "admin", ми робимо редирект на ../login.php
		header("Location: ../index.php");
}	} else {
		header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="/Seedra/admin/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/Seedra/admin/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">

