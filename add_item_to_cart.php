<?php

ini_set('display_errors', 1);


require_once "connect.php";

$connection = getConnection();

$id = $_POST['album_id'];

$sql = "SELECT artist, album_name, price FROM records WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $id
]);

$record = $query->fetch();

$sql = "INSERT into cart (album_id, album_name, album_price) VALUES (:album_id, :album_name, :album_price)";
$query = $connection->prepare($sql);
$query->execute([
    "album_id" => $id,
    "album_name" => $record['album_name'],
    "album_price" => $record['price']
]);

header("Location: /store_page.php");

?>