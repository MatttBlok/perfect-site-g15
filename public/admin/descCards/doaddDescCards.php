<?php
if (empty($_POST['category']) || empty($_POST['name']) || empty($_POST['localisation'])
    || empty($_POST['rating']) || empty($_POST['imgSrc']) || empty($_POST['imgAlt']) || empty($_POST['imgTitle'])
    ||  empty($_POST['desc']) ||  empty($_POST['schedule']) ||  empty($_POST['price'])) {
    header('Location: ./index.php?error=empty field(s)');
    exit;
}

require_once '../../../includes/connection.php';

$request = "INSERT INTO `descCards` 
(`category`, `name`, `localisation`, `rating`, `desc`, `imgSrc`, `imgAlt`, `imgTitle`, `schedule`, `price`) 
VALUES 
(:category, :name, :localisation, :rating, :desc, :imgSrc, :imgAlt, :imgTitle, :schedule, :price)
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':category', htmlentities($_POST['category']));
$stmt->bindValue(':name', htmlentities($_POST['name']));
$stmt->bindValue(':localisation', htmlentities($_POST['localisation']));
$stmt->bindValue(':rating', htmlentities($_POST['rating']));
$stmt->bindValue(':desc', htmlentities($_POST['desc']));
$stmt->bindValue(':imgSrc', htmlentities($_POST['imgSrc']));
$stmt->bindValue(':imgAlt', htmlentities($_POST['imgAlt']));
$stmt->bindValue(':imgTitle', htmlentities($_POST['imgTitle']));
$stmt->bindValue(':schedule', htmlentities($_POST['schedule']));
$stmt->bindValue(':price', htmlentities($_POST['price']));
$stmt->execute();

header('Location: ./index.php');