<?php
require_once '../../../includes/connection.php';
require_once '../../../includes/functions.php';

if (!isLogged()) {
	header("location: ../login.php");
	die();
}


$request = 'SELECT `id`, `name` FROM `descCards`;';

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
<h2>Your current description card:</h2>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
    </tr>
    <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['id']?></td>
            <td><a href="showDescCards.php?id=<?=$row['id']?>"><?=$row['name']?></a></td>
        </tr>
    <?php endwhile ?>
</table>
<br>
<h2>Add a description card here:</h2>
<form action="doaddDescCards.php" method="post">
    <label for="category">category</label>
    <select name="category">
        <option value="Bar" selected>Bar</option>
        <option value="Restaurant">Restaurant</option>
        <option value="Hôtel">Hôtel</option>
    </select>
    <label for="name">name</label> <input type="text" name="name"">
    <label for="localisation">localisation</label> <input type="text" name="localisation"">
    <select name="rating">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <label for="desc">desc</label><textarea name="desc"></textarea><br>
    <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc"">
    <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt"">
    <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle"">
    <label for="schedule">schedule</label> <input type="text" name="schedule"">
    <label for="price">price</label> <input type="text" name="price">
    <label for="link">link</label> <input type="text" name="link">
    <input type="submit" value="add this description card">
</form>
<?php if (isset($_GET['error'])) :?>
    <p class="error"><?=$_GET['error']?></p>
<?php endif; ?>
</body>
</html>