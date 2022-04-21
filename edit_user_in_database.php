<?php

ini_set('display_errors', 1);

require_once "connect.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$connection = getConnection();

$sql = "SELECT id, name, email FROM users WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $id
]);

$user = $query->fetch();

if (!$user) {
    echo "USER_NOT_FOUND";
    exit;
}

$sql = "UPDATE users SET email = :email, name = :name WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "name" => $name,
    "email" => $email,
    "id" => $id
]);

session_start();

$_SESSION['user'] = $user;
$_SESSION['user']['id'] = $id;
$_SESSION['user']['name'] = $name;
$_SESSION['user']['email'] = $email;

header("Location: /user_page.php");