<?php
require_once '../../../includes/connection.php';
require_once '../../../includes/functions.php';

if (!isLogged()) {
	header("location: ../login.php");
	die();
}


$request = 'SELECT `id`, `title` FROM `articles`;';

$stmt = $pdo->prepare($request);
$stmt->execute();

date_default_timezone_set('UTC');
$today = date("j/n/Y");

$cookieData = unserialize($_COOKIE['admin']);
$username = $cookieData['name'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
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
<p style="color: #00cc99">Connected as <?=$username?></p>

<form action="../doLogOut.php" style="width: 100px;margin-left:10px;">
    <input class="btn btn-warning" type="submit" value="Log out" style="color:black;">
</form>
<br style="margin-top: 10px;">
<a href="../">Go back to the home page</a>
<br>
<div style="margin-left: 20px;margin-bottom: 20px;">
    <h2>Your current articles:</h2>
    <table>
        <tr>
            <th>id</th>
            <th>title</th>
        </tr>
        <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?=$row['id']?></td>
                <td><a href="showArticle.php?id=<?=$row['id']?>"><?=$row['title']?></a></td>
            </tr>
        <?php endwhile ?>
    </table>
    <br>
    <h2>Add an article here:</h2>
    <form action="doaddArticle.php" method="post">
        <label for="category">category</label>
        <select name="category">
            <option value="Bons plans aériens" selected>Bons plans aériens</option>
            <option value="Voyages">Voyages</option>
        </select>
        <label for="title">title</label> <input type="text" name="title">
        <label for="subtitle">subtitle</label> <input type="text" name="subtitle">
        <label for="content">content</label><textarea style="width: 400px;height: 200px;" name="content"></textarea><br>
        <label for="imgSrc">imgSrc</label> <input type="text" name="imgSrc">
        <label for="imgAlt">imgAlt</label> <input type="text" name="imgAlt">
        <label for="imgTitle">imgTitle</label> <input type="text" name="imgTitle">
        <input type="hidden" name="publishedDate" value="<?= $today ?>">
        <label for="author">author</label> <input type="text" name="author">
        <label for="signature">signature</label> <input type="text" name="signature">
        <label for="logoSrc">logoSrc</label> <input type="text" name="logoSrc">
        <label for="logoAlt">logoAlt</label> <input type="text" name="logoAlt">
        <label for="logoTitle">logoTitle</label> <input type="text" name="logoTitle">
        <input type="submit" value="add this article">
    </form>
    <?php if (isset($_GET['error'])) :?>
        <p class="error"><?=$_GET['error']?></p>
    <?php endif; ?>
</div>
</body>
</html>