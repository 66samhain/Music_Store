<?php

ini_set('display_errors', 1);

require_once "connect.php";

$connection = getConnection();

$addresses = $_POST['addresses'];
$id = $_POST['id'];

$addresses = array_filter($addresses); // stergem campurile null din array

$sql = "DELETE FROM addresses WHERE user_id = :user_id";
$query = $connection->prepare($sql);
$query->execute([
    "user_id" => $id
]);

foreach ($addresses as $key => $address) {
    $sql = "INSERT into addresses (address, user_id) VALUES (:address, :user_id)";
    $query = $connection->prepare($sql);
    $query->execute([
        "address" => $address,
        "user_id" => $id
    ]);
}

header("Location: /user_page.php");