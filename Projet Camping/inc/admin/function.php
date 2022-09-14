<?php

function bddConnect() {
    $dsn = "mysql:host=localhost;dbname=MAIN";
    $user = "root";
    $password = "root";
    $pdoOptions = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    $databaseConnection = new PDO($dsn, $user, $password, $pdoOptions);

    return $databaseConnection;
}


?>