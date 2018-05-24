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
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
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

    <form action="./doLogOut.php" style="width: 100px;margin-left:10px;">
        <input class="btn btn-warning" type="submit" value="Log out" style="color:black;">
    </form>

    <?php if (isset($_GET['error'])) :?>
        <p class="error"><?=$_GET['error']?></p>
    <?php endif; ?>

    <div>
        <ul class="list-unstyled" style="margin-left:10px;margin-top:20px;display: flex;justify-content:space-between;width: 800px;">
            <li style="text-decoration: none;"><a class="btn btn-info" href="./articles/">Articles</a></li>
            <li><a class="btn btn-info" href="./partners/">Partners</a></li>
            <li><a class="btn btn-info" href="./airlineCompanies/">Airline Companies</a></li>
            <li><a class="btn btn-info" href="./imgsGallery/">Images Gallery</a></li>
            <li><a class="btn btn-info" href="./comments/">Comments</a></li>
            <li><a class="btn btn-info" href="./topHundred/">Top 100</a></li>
            <li><a class="btn btn-info" href="./descCards/">Fiches descriptives</a></li>
        </ul>
    </div>
</body>
</html>