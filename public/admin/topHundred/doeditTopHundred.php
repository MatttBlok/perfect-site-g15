<?php
if (!isset($_POST['id']) || empty($_POST['category']) || empty($_POST['name']) || empty($_POST['localisation'])
    || empty($_POST['ranking']) || empty($_POST['imgSrc']) || empty($_POST['imgAlt']) || empty($_POST['imgTitle'])
    ||  empty($_POST['description']) ||  empty($_POST['link'])) {
    header('Location: ./index.php?noidorpostdataprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = "UPDATE `topHundred`
SET 
`category` = :category,
`name` = :name,
`localisation` = :localisation,
`ranking` = :ranking,
`imgSrc` = :imgSrc,
`imgAlt` = :imgAlt,
`imgTitle` = :imgTitle,
`description` = :description,
`link` = :link
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', htmlentities($_POST['id']));
$stmt->bindValue(':category', htmlentities($_POST['category']));
$stmt->bindValue(':name', htmlentities($_POST['name']));
$stmt->bindValue(':localisation', htmlentities($_POST['localisation']));
$stmt->bindValue(':ranking', htmlentities($_POST['ranking']));
$stmt->bindValue(':imgSrc', htmlentities($_POST['imgSrc']));
$stmt->bindValue(':imgAlt', htmlentities($_POST['imgAlt']));
$stmt->bindValue(':imgTitle', htmlentities($_POST['imgTitle']));
$stmt->bindValue(':description', htmlentities($_POST['description']));
$stmt->bindValue(':link', htmlentities($_POST['link']));
$stmt->execute();

header('Location: ./index.php');