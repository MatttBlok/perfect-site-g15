<?php
if (empty($_POST['name']) || empty($_POST['twitterAccount'])) {
    header('Location: ./index.php?error=empty field(s)');
    exit;
}

require_once '../../../includes/connection.php';

$request = "INSERT INTO `airlineCompanies` 
(`name`, `twitterAccount`) 
VALUES 
(:name, :twitterAccount)
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':name', htmlentities($_POST['name']));
$stmt->bindValue(':twitterAccount', htmlentities($_POST['twitterAccount']));
$stmt->execute();

header('Location: ./index.php');