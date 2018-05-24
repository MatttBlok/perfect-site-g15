<?php
if (!isset($_POST['id']) || empty($_POST['category']) || empty($_POST['name']) || empty($_POST['localisation'])
    || empty($_POST['rating']) || empty($_POST['imgSrc']) || empty($_POST['imgAlt']) || empty($_POST['imgTitle'])
    ||  empty($_POST['desc']) ||  empty($_POST['schedule']) ||  empty($_POST['price']) ||  empty($_POST['link'])) {
    header('Location: ./index.php?noidorpostdataprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = "UPDATE `descCards`
SET 
`category` = :category,
`name` = :name,
`localisation` = :localisation,
`rating` = :rating,
`desc` = :desc,
`imgSrc` = :imgSrc,
`imgAlt` = :imgAlt,
`imgTitle` = :imgTitle,
`schedule` = :schedule,
`price` = :price,
`link` = :link
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', htmlentities($_POST['id']));
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
$stmt->bindValue(':link', htmlentities($_POST['link']));
$stmt->execute();

header('Location: ./index.php');