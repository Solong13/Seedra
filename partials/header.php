<?php
session_start();// початок сесії
require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/db.php');

require($_SERVER['DOCUMENT_ROOT'] . '/Seedra/config/helpers.php');

  $is_session = isset($_SESSION['user_id']) && $_SESSION['user_id'] != null;
  $is_cookie = isset($_COOKIE['user_id']) && $_COOKIE['user_id'] != null;

  if($is_session || $is_cookie) {

    $userID = $is_session ? $_SESSION['user_id'] : $_COOKIE['user_id'];
      
    $sql = "SELECT * FROM users WHERE id=" . $userID; // вибираємо де вибраний айді буде дорівнювати нашому айді через сесію. Тобто шукаємо по id
    $result = mysqli_query($conn, $sql);// виконання запросу
    $user = $result->fetch_assoc();// вивід всіх даних, а саме сесії
    
    if($user['role'] != "admin") {
      header("Locaton: /Seedra/login.php");
    }
  } else {
    header("Locaton: /Seedra/login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600&display=swap" rel="stylesheet">
    
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="assets/css/mainForCart.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styleForLogin.css">
    <link rel="stylesheet" href="assets/css/slider.css">
    <title>SEEDRA</title>
</head>
<body>
