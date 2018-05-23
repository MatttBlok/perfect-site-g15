<?php
if (empty($_POST['name']) || empty($_POST['logoSrc']) || empty($_POST['logoAlt']) || empty($_POST['logoTitle'])) {
    header('Location: ./index.php?error=empty field(s)');
    exit;
}

require_once '../../../includes/connection.php';

$request = "INSERT INTO `partners` 
(`name`, `logoSrc`, `logoAlt`, `logoTitle`) 
VALUES 
(:name, :logoSrc, :logoAlt, :logoTitle)
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':name', htmlentities($_POST['name']));
$stmt->bindValue(':logoSrc', htmlentities($_POST['logoSrc']));
$stmt->bindValue(':logoAlt', htmlentities($_POST['logoAlt']));
$stmt->bindValue(':logoTitle', htmlentities($_POST['logoTitle']));
$stmt->execute();

header('Location: ./index.php');