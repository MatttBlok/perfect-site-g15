<?php
if (empty($_POST['imgSrc']) || empty($_POST['imgAlt']) || empty($_POST['imgTitle'])) {
    header('Location: ./index.php?error=empty field(s)');
    exit;
}

require_once '../../../includes/connection.php';

$request = "INSERT INTO `imgsGallery` 
(`imgSrc`, `imgAlt`, `imgTitle`) 
VALUES 
(:imgSrc, :imgAlt, :imgTitle)
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':imgSrc', htmlentities($_POST['imgSrc']));
$stmt->bindValue(':imgAlt', htmlentities($_POST['imgAlt']));
$stmt->bindValue(':imgTitle', htmlentities($_POST['imgTitle']));
$stmt->execute();

header('Location: ./index.php');