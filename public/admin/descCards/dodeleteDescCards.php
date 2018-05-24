<?php
if (!isset($_POST['id'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = 'DELETE FROM `descCards` WHERE `id` = :id';

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', $_POST['id']);
$stmt->execute();
header('Location: index.php');