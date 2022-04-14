<?php

ini_set('display_errors', 1);

require_once "connect.php";

$id = $_POST['id'];
$artist = $_POST['artist'];
$album = $_POST['album_name'];
$year = $_POST['year'];
$img = $_POST['img_src'];
$stock = $_POST['stock'];

$connection = getConnection();

$sql = "SELECT artist, album_name, year, img_src, stock FROM records WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    'id' => $id
]);
$record = $query->fetch();

if (!$record) {
    echo "RECORD_NOT_FOUND";
    exit;
}

$sql = "UPDATE records SET artist = :artist, album_name = :album_name, year = :year, img_src = :img_src, stock = :stock WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $id,
    "artist" => $artist,
    "album_name" => $album,
    "year" => $year,
    "img_src" => $img,
    "stock" => $stock
]);

// $sql = "INSERT into records (artist, album_name, year, img_src, stock) VALUES (:artist, :album_name, :year, :img_src, :stock)";
// $query = $connection->prepare($sql);
// $query->execute([
//     "artist" => $artist,
//     "album_name" => $album,
//     "year" => $year,
//     "img_src" => $img,
//     "stock" => $stock
// ]);

header("Location: /index.php");