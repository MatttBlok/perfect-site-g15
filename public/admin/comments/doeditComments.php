<?php
if (!isset($_POST['id']) || empty($_POST['content']) ||  empty($_POST['author']) ||  empty($_POST['publishedDate'])) {
    header('Location: ./index.php?noidorpostdataprovided');
    exit;
}

require_once '../../../includes/connection.php';

$request = "UPDATE `comments`
SET 
`content` = :content,
`author` = :author,
`publishedDate` = :publishedDate
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', htmlentities($_POST['id']));
$stmt->bindValue(':content', htmlentities($_POST['content']));
$stmt->bindValue(':author', htmlentities($_POST['author']));
$stmt->bindValue(':publishedDate', htmlentities($_POST['publishedDate']));
$stmt->execute();

header('Location: ./index.php');