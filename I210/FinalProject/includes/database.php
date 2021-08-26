<?php

$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "videogame_db";

$conn = @new mysqli($host, $login, $password, $database);

if ($conn->connect_errno){
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Your connection to database has failed: ($errno) $errmsg.");
}
