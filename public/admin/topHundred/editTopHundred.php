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
`id`, `category`, `name`, `localisation`, `ranking`, `imgSrc`, `imgAlt`, `imgTitle`, `description`, `link` 
FROM 
`topHundred` 
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
<a href="./showTopHundred.php?id=<?=$_GET['id']?>">Go back to your article</a>
<h2>Edit <?=$row['name']?> here:</h2>

<form action="doeditTopHundred.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="category">category</label>
    <select name="category">
        <option value="Hôtel" <?php if ($row['category'] === "Hôtel") :?>selected<?php endif;?>>Hôtel</option>
        <option value="Restaurant" <?php if ($row['category'] === "Restaurant") :?>selected<?php endif;?>>Restaurant</option>
        <option value="Spa" <?php if ($row['category'] === "Spa") :?>selected<?php endif;?>>Spa</option>
    </select>
    <label for="name">name</label> <input type="text" name="name" value="<?=$row['name']?>">
    <label for="localisation">localisation</label> <input type="text" name="localisation" value="<?=$row['localisation']?>">
    <label for="ranking">ranking</label> <input type="text" name="ranking" value="<?=$row['ranking']?>">
    <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc" value="<?=$row['imgSrc']?>">
    <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt" value="<?=$row['imgAlt']?>">
    <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle" value="<?=$row['imgTitle']?>">
    <label for="description">description</label> <input type="text" name="description" value="<?=$row['description']?>">
    <label for="link">link</label> <input type="text" name="link" value="<?=$row['link']?>">
    <input type="submit" value="edit this article">
</form>

</body>
</html>