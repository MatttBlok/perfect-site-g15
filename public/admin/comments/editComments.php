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
`id`, `content`, `author`, `publishedDate` 
FROM 
`comments` 
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <a href="./showComments.php?id=<?=$_GET['id']?>">Go back to your comment</a>

    <h2>Edit "<?=$row['content']?>" here:</h2>

    <form action="doeditComments.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label for="content">content</label> <input type="text" name="content" value="<?=$row['content']?>">
        <label for="author">author</label> <input type="text" name="author" value="<?=$row['author']?>">
        <input type="hidden" name="publishedDate" value="<?=$row['publishedDate']?>">
        <input type="submit" value="edit this comment">
    </form>
</body>
</html>