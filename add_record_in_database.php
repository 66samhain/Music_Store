<?php

require_once "connect.php";

$artist = $_POST['artist'];
$album = $_POST['album_name'];
$year = $_POST['year'];
$img = $_POST['img_src'];
$stock = $_POST['stock'];

$connection = getConnection();

$sql = "INSERT into records (artist, album_name, year, img_src, stock) VALUES (:artist, :album_name, :year, :img_src, :stock)";
$query = $connection->prepare($sql);
$query->execute([
    "artist" => $artist,
    "album_name" => $album,
    "year" => $year,
    "img_src" => $img,
    "stock" => $stock
]);

header("Location: /index.php");