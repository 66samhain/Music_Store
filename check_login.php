<?php

ini_set('display_errors', 1);

session_start();

require_once "connect.php";

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['user_is_logged_in'] = false;
$_COOKIE['error_message'] = null;

$connection = getConnection();

$sql = "SELECT id, email, password, name FROM users WHERE email = :email";
$query = $connection->prepare($sql);
$query->execute([
    "email" => $email
]);
$user = $query->fetch();

if (!$user) {
    setcookie("error_message", "User does not exist");
    header("Location: /login_page.php");
}

if ($password !== $user['password']) {
    setcookie("error_message", "Invalid credentials");
    header("Location: /login_page.php");
}

if ($email === $user['email'] && $password === $user['password']) {
    $_SESSION['user_is_logged_in'] = true;
    $_SESSION['user'] = $user;
    header("Location: /index.php");
}