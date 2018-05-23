<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=uneanneedevoyages', 'root', 'root');
    $pdo->exec("SET NAMES UTF8");
} catch (PDOException $exception) {
    require "error.php";
    die();
}