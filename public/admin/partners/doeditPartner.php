<?php
if (!isset($_POST['id']) || empty($_POST['name']) ||  empty($_POST['logoSrc']) ||  empty($_POST['logoAlt']) ||  empty($_POST['logoTitle'])) {
    header('Location: ./index.php?noidorpostdataprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = "UPDATE `partners`
SET 
`name` = :name,
`logoSrc` = :logoSrc,
`logoAlt` = :logoAlt,
`logoTitle` = :logoTitle
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', htmlentities($_POST['id']));
$stmt->bindValue(':name', htmlentities($_POST['name']));
$stmt->bindValue(':logoSrc', htmlentities($_POST['logoSrc']));
$stmt->bindValue(':logoAlt', htmlentities($_POST['logoAlt']));
$stmt->bindValue(':logoTitle', htmlentities($_POST['logoTitle']));
$stmt->execute();

header('Location: ./index.php');