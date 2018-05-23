<?php
if (!isset($_POST['id']) || empty($_POST['imgSrc']) ||  empty($_POST['imgAlt']) ||  empty($_POST['imgTitle'])) {
    header('Location: ./index.php?noidorpostdataprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = "UPDATE `imgsGallery`
SET 
`imgSrc` = :imgSrc,
`imgAlt` = :imgAlt,
`imgTitle` = :imgTitle,
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', htmlentities($_POST['id']));
$stmt->bindValue(':imgSrc', htmlentities($_POST['imgSrc']));
$stmt->bindValue(':imgAlt', htmlentities($_POST['imgAlt']));
$stmt->bindValue(':imgTitle', htmlentities($_POST['imgTitle']));
$stmt->execute();

header('Location: ./index.php');