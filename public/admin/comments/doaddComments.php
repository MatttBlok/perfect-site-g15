<?php
if (empty($_POST['content']) || empty($_POST['author']) || empty($_POST['publishedDate'])) {
    header('Location: ./index.php?error=empty field(s)');
    exit;
}

require_once '../../../includes/connection.php';

$request = "INSERT INTO `comments` 
(`content`, `author`, `publishedDate`) 
VALUES 
(:content, :author, :publishedDate)
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':content', htmlentities($_POST['content']));
$stmt->bindValue(':author', htmlentities($_POST['author']));
$stmt->bindValue(':publishedDate', htmlentities($_POST['publishedDate']));
$stmt->execute();

header('Location: ./index.php');