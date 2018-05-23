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
`id`, `name`, `logoSrc`, `logoAlt`, `logoTitle` 
FROM 
`partners` 
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
<a href="./showPartner.php?id=<?=$_GET['id']?>">Go back to your partner</a>
<h2>Edit <?=$row['name']?> here:</h2>

<form action="doeditPartner.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="name">name</label> <input type="text" name="name" value="<?=$row['name']?>">
    <label for="logoSrc">logoSrc</label> <input type="text" name="logoSrc" value="<?=$row['logoSrc']?>">
    <label for="logoAlt">logoAlt</label> <input type="text" name="logoAlt" value="<?=$row['logoAlt']?>">
    <label for="logoTitle">logoTitle</label> <input type="text" name="logoTitle" value="<?=$row['logoTitle']?>">
    <input type="submit" value="edit this partner">
</form>

</body>
</html>