<?php
require_once '../../includes/connection.php';
require_once '../../includes/functions.php';

if (!isLogged()) {
	header("location: ./login.php");
	die();
}
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
    <form action="./doLogOut.php">
        <input type="submit" value="Log out">
    </form>

    <p>Connected as <?=$username?></p>

    <?php if (isset($_GET['error'])) :?>
        <p class="error"><?=$_GET['error']?></p>
    <?php endif; ?>

    <ul>
        <li><a href="./articles/">Articles</a></li>
        <li><a href="./partners/">Partners</a></li>
        <li><a href="./airlineCompanies/">Airline Companies</a></li>
        <li><a href="./imgsGallery/">Images Gallery</a></li>
        <li><a href="./comments/">Comments</a></li>
        <li><a href="./topHundred/">Top 100</a></li>
        <li><a href="./descCards/">Fiches descriptives</a></li>
    </ul>
</body>
</html>