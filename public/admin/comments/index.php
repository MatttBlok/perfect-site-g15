<?php
require_once '../../../includes/connection.php';
require_once '../../../includes/functions.php';

if (!isLogged()) {
	header("location: ../login.php");
	die();
}

$request = 'SELECT `id`, `content` FROM `comments`;';

$stmt = $pdo->prepare($request);
$stmt->execute();

date_default_timezone_set('UTC');
$today = date("j/n/Y");
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
<h2>Your current comments:</h2>
<table>
    <tr>
        <th>id</th>
        <th>content</th>
    </tr>
    <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['id']?></td>
            <td><a href="showComments.php?id=<?=$row['id']?>"><?=$row['content']?></a></td>
        </tr>
    <?php endwhile ?>
</table>
<br>
<h2>Add a comment here:</h2>
<form action="doaddComments.php" method="post">
    <label for="content">content</label> <input type="text" name="content">
    <label for="author">author</label> <input type="text" name="author">
    <input type="hidden" name="publishedDate" value="<?= $today ?>">
    <input type="submit" value="add this image">
</form>
<?php if (isset($_GET['error'])) :?>
    <p class="error"><?=$_GET['error']?></p>
<?php endif; ?>
</body>
</html>