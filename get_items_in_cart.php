<?php

ini_set('display_errors', 1);

require_once "connect.php";


function checkItemsInCart() {
    $connection = getConnection();

    $sql = "SELECT id, album_name, album_price FROM cart";
    $query = $connection->prepare($sql);
    $query-> execute([]);

    $cart = $query->fetchAll();

    if ($cart) {
        return true;
    } else {
        return false;
    }
}


function getItemsInCart() {

    $connection = getConnection();

    $sql = "SELECT id, album_name, album_price FROM cart";
    $query = $connection->prepare($sql);
    $query-> execute([]);

    $cart = $query->fetchAll();

    $total = 0;
    foreach($cart as $key => $cartItem) {
        $total += $cartItem['album_price'];
        echo "<p>" . $key+1 . ". " . $cartItem['album_name'] . " - " . $cartItem['album_price'] . " lei" . "</p>";
    }

    if ($total) {
        echo "Total: " . $total . " lei";
    } else {
        echo "No items in cart!";
    }
}

?>