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

$request = 'SELECT `id`, `imgTitle` FROM `imgsGallery` WHERE `id` = :id;';

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
        h1 {
            font-size: 30px;
            font-weight: 900;
        }
    </style>
</head>
<body>
<a href="./showImgsGallery.php?id=<?=$_GET['id']?>">Go back to your image</a>
<h1>Do you really want to delete <?=$row['imgTitle']?> ?</h1>
<form action="dodeleteImgsGallery.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input type="submit" value="Yes, I do.">
</form>
</body>
</html>