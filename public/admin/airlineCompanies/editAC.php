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
`id`, `name`, `twitterAccount` 
FROM 
`airlineCompanies` 
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
    <a href="./showAC.php?id=<?=$_GET['id']?>">Go back to your airline company</a>

    <h2>Edit <?=$row['name']?> here:</h2>

    <form action="doeditAC.php" method="post">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <label for="name">name</label> <input type="text" name="name" value="<?=$row['name']?>">
        <label for="twitterAccount">twitterAccount</label> <input type="text" name="twitterAccount" value="<?=$row['twitterAccount']?>">
        <input type="submit" value="edit this airline company">
    </form>
</body>
</html>