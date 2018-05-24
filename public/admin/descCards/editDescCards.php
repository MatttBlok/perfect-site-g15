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
`id`, `category`, `name`, `localisation`, `rating`, `desc`, `imgSrc`, `imgAlt`, `imgTitle`, `schedule`, `price`, `link` 
FROM 
`descCards`
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
<a href="./showDescCards.php?id=<?=$_GET['id']?>">Go back to your description card</a>
<h2>Edit <?=$row['name']?> here:</h2>

<form action="doeditDescCards.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <label for="category">category</label>
    <select name="category">
        <option value="Bar" <?php if ($row['category'] === "Bar") :?>selected<?php endif;?>>Bar</option>
        <option value="Restaurant" <?php if ($row['category'] === "Restaurant") :?>selected<?php endif;?>>Restaurant</option>
        <option value="Hôtel" <?php if ($row['category'] === "Hôtel") :?>selected<?php endif;?>>Hôtel</option>
    </select>
    <label for="name">name</label> <input type="text" name="name" value="<?=$row['name']?>">
    <label for="localisation">localisation</label> <input type="text" name="localisation" value="<?=$row['localisation']?>">
    <select name="rating">
        <option value="0" <?php if ($row['rating'] === "0") :?>selected<?php endif;?>>0</option>
        <option value="1" <?php if ($row['rating'] === "1") :?>selected<?php endif;?>>1</option>
        <option value="2" <?php if ($row['rating'] === "2") :?>selected<?php endif;?>>2</option>
        <option value="3" <?php if ($row['rating'] === "3") :?>selected<?php endif;?>>3</option>
        <option value="4" <?php if ($row['rating'] === "4") :?>selected<?php endif;?>>4</option>
        <option value="5" <?php if ($row['rating'] === "5") :?>selected<?php endif;?>>5</option>
    </select>
    <label for="desc">desc</label><textarea name="desc"><?=$row['desc']?></textarea><br>
    <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc" value="<?=$row['imgSrc']?>">
    <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt" value="<?=$row['imgAlt']?>">
    <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle" value="<?=$row['imgTitle']?>">
    <label for="schedule">schedule</label> <input type="text" name="schedule" value="<?=$row['schedule']?>">
    <label for="price">price</label> <input type="text" name="price" value="<?=$row['price']?>">
    <label for="link">link</label> <input type="text" name="link" value="<?=$row['link']?>">
    <input type="submit" value="edit this description card">
</form>

</body>
</html>