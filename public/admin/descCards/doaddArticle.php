<?php
if (empty($_POST['category']) || empty($_POST['title']) || empty($_POST['subtitle'])
    || empty($_POST['content']) || empty($_POST['imgSrc']) || empty($_POST['imgAlt']) || empty($_POST['imgTitle'])
    ||  empty($_POST['publishedDate']) ||  empty($_POST['author']) ||  empty($_POST['signature'])
    ||  empty($_POST['logoSrc']) ||  empty($_POST['logoAlt']) ||  empty($_POST['logoTitle'])) {
    header('Location: ./index.php?error=empty field(s)');
    exit;
}

require_once '../../../includes/connection.php';

$request = "INSERT INTO `articles` 
(`category`, `title`, `subtitle`, `content`, `imgSrc`, `imgAlt`, `imgTitle`, `publishedDate`, `author`, `signature`, `logoSrc`, `logoAlt`, `logoTitle`) 
VALUES 
(:category, :title, :subtitle, :content, :imgSrc, :imgAlt, :imgTitle, :publishedDate, :author, :signature, :logoSrc, :logoAlt, :logoTitle)
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':category', htmlentities($_POST['category']));
$stmt->bindValue(':title', htmlentities($_POST['title']));
$stmt->bindValue(':subtitle', htmlentities($_POST['subtitle']));
$stmt->bindValue(':content', htmlentities($_POST['content']));
$stmt->bindValue(':imgSrc', htmlentities($_POST['imgSrc']));
$stmt->bindValue(':imgAlt', htmlentities($_POST['imgAlt']));
$stmt->bindValue(':imgTitle', htmlentities($_POST['imgTitle']));
$stmt->bindValue(':publishedDate', htmlentities($_POST['publishedDate']));
$stmt->bindValue(':author', htmlentities($_POST['author']));
$stmt->bindValue(':signature', htmlentities($_POST['signature']));
$stmt->bindValue(':logoSrc', htmlentities($_POST['logoSrc']));
$stmt->bindValue(':logoAlt', htmlentities($_POST['logoAlt']));
$stmt->bindValue(':logoTitle', htmlentities($_POST['logoTitle']));
$stmt->execute();

header('Location: ./index.php');