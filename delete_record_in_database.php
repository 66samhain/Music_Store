<?php

require_once "connect.php";

$id = $_POST['id'];

$connection = getConnection();

$sql = "SELECT COUNT(id) FROM records WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $id
]);

$record = $query->fetch();

if(!$record) {
    echo "RECORD_DOES_NOT_EXIST";
    exit;
}

$sql = "DELETE FROM records WHERE id = :id";
$query = $connection->prepare($sql);
$query->execute([
    "id" => $id
]);

header("Location: /index.php");