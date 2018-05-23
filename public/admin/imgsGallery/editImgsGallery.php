<?php
if (!isset($_GET['id'])) {
    header('Location: index.php?error=noidprovided');
    exit;
}

require_once '../../../includes/connection.php';
require_once '../../../includes/functions.php';

if (!isLogged()) {
    header("location: ../login.php");
    die();
}

$request = "SELECT 
`id`, `imgSrc`, `imgAlt`, `imgTitle` 
FROM 
`imgsGallery` 
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            width: 200px;
        }
    </style>
</head>
<body>
    <a href="./showImgsGallery.php?id=<?=$_GET['id']?>">Go back to your image</a>

    <h2>Edit <?=$row['imgTitle']?> here:</h2>

    <form action="doeditImgsGallery.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc" value="<?=$row['imgSrc']?>">
        <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt" value="<?=$row['imgAlt']?>">
        <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle" value="<?=$row['imgTitle']?>">
        <input type="submit" value="edit this image">
    </form>
</body>
</html>