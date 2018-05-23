<?php
if (!isset($_POST['id']) || empty($_POST['name']) ||  empty($_POST['twitterAccount'])) {
    header('Location: ./index.php?noidorpostdataprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = "UPDATE `airlineCompanies`
SET 
`name` = :name,
`twitterAccount` = :twitterAccount
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', htmlentities($_POST['id']));
$stmt->bindValue(':name', htmlentities($_POST['name']));
$stmt->bindValue(':twitterAccount', htmlentities($_POST['twitterAccount']));
$stmt->execute();

header('Location: ./index.php');