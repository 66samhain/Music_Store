<?php

require_once "admin_middleware.php";
require_once "connect.php";
require_once "get_items_in_cart.php";

$connection = getConnection();

$address = $_POST['address'];

$sql = "SELECT id, album_name, album_price FROM cart";
$query = $connection->prepare($sql);
$query-> execute([]);

$cart = $query->fetchAll();

