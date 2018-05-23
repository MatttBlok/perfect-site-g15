<?php
if (!isset($_POST['name']) || !isset($_POST['password']) || empty($_POST['name']) || empty($_POST['password'])) {
    header("Location: ./login.php?error=empty field(s)");
    die();
}

require_once '../../includes/connection.php';
require_once '../../includes/functions.php';

if (!connectUser($_POST['name'], $_POST['password'], $pdo)) {
    header("Location: ./login.php?error=wrong name or password");
    exit;
}
header("Location: ./");