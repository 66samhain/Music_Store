<?php

function getConnection() {
    try {
        $dsn = "mysql:host=localhost;dbname=music_store";
        $connection = new PDO($dsn, "root", "root");
    } catch (PDOException $exception) {
        echo "CANNOT_CONNECT_TO_DB";
        exit;
    }



    return $connection;
}

