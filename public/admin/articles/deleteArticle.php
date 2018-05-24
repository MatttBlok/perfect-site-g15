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

$request = 'SELECT `id`, `title` FROM `articles` WHERE `id` = :id;';

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

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
        h1 {
            font-size: 30px;
            font-weight: 900;
        }
    </style>
</head>
<body>
<p style="color: #00cc99">Connected as <?=$username?></p>

<form action="../doLogOut.php" style="width: 100px;margin-left:10px;">
    <input class="btn btn-warning" type="submit" value="Log out" style="color:black;">
</form>
<br>
<a href="./showArticle.php?id=<?=$_GET['id']?>">Go back to your article</a>
<h1 style="margin-left: 20px;">Do you really want to delete <?=$row['title']?> ?</h1>
<form style="margin-left: 20px;" action="dodeleteArticle.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']?>">
    <input class="btn btn-danger" type="submit" value="Yes, I do.">
</form>
</body>
</html>