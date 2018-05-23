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
`id`, `category`, `title`, `subtitle`, `content`, `imgSrc`, `imgAlt`, `imgTitle`, `publishedDate`, `author`, `signature`, `logoSrc`, `logoAlt`, `logoTitle` 
FROM 
`articles` 
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
<a href="./showArticle.php?id=<?=$_GET['id']?>">Go back to your article</a>
<h2>Edit <?=$row['title']?> here:</h2>

<form action="doeditArticle.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="category">category</label> <input type="text" name="category" value="<?=$row['category']?>">
    <label for="title">title</label> <input type="text" name="title" value="<?=$row['title']?>">
    <label for="subtitle">subtitle</label> <input type="text" name="subtitle" value="<?=$row['subtitle']?>">
    <label for="content">content</label><textarea name="content"><?=$row['content']?></textarea><br>
    <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc" value="<?=$row['imgSrc']?>">
    <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt" value="<?=$row['imgAlt']?>">
    <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle" value="<?=$row['imgTitle']?>">
    <label for="publishedDate">publishedDate</label> <input type="text" name="publishedDate" value="<?=$row['publishedDate']?>">
    <label for="author">author</label> <input type="text" name="author" value="<?=$row['author']?>">
    <label for="signature">signature</label> <input type="text" name="signature" value="<?=$row['signature']?>">
    <label for="logoSrc">logoSrc</label> <input type="text" name="logoSrc" value="<?=$row['logoSrc']?>">
    <label for="logoAlt">logoAlt</label> <input type="text" name="logoAlt" value="<?=$row['logoAlt']?>">
    <label for="logoTitle">logoTitle</label> <input type="text" name="logoTitle" value="<?=$row['logoTitle']?>">
    <input type="submit" value="edit this article">
</form>

</body>
</html>