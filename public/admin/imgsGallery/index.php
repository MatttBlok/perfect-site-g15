<?php
require_once '../../../includes/connection.php';
require_once '../../../includes/functions.php';

if (!isLogged()) {
	header("location: ../login.php");
	die();
}

$request = 'SELECT `id`, `imgTitle` FROM `imgsGallery`;';

$stmt = $pdo->prepare($request);
$stmt->execute();
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
        table {
            width: 600px;
            margin-top: 30px;
        }
        td, th {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }
        h1 {
            font-size: 30px;
            font-weight:900;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 200px;
        }
    </style>
</head>
<body>
<form action="../doLogOut.php">
    <input type="submit" value="Log out">
</form>
<br>
<a href="../">Go back to the home page</a>
<br>
<h2>Your current images:</h2>
<table>
    <tr>
        <th>id</th>
        <th>image title</th>
    </tr>
    <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['id']?></td>
            <td><a href="showImgsGallery.php?id=<?=$row['id']?>"><?=$row['imgTitle']?></a></td>
        </tr>
    <?php endwhile ?>
</table>
<br>
<h2>Add an image here:</h2>
<form action="doaddImgsGallery.php" method="post">
    <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc">
    <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt">
    <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle">
    <input type="submit" value="add this image">
</form>
<?php if (isset($_GET['error'])) :?>
    <p class="error"><?=$_GET['error']?></p>
<?php endif; ?>
</body>
</html>