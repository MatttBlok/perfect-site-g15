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
`id`, `category`, `name`, `localisation`, `rating`, `desc`, `imgSrc`, `imgAlt`, `imgTitle`, `schedule`, `price` 
FROM 
`descCards`
WHERE 
`id` = :id
;";

$stmt = $pdo->prepare($request);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
            width: 1200px;
            margin-top: 30px;
        }
        td, th {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            text-align: center;
        }
        h1 {
            font-size: 30px;
            font-weight:900;
        }
    </style>
</head>
<body>
<a href="./">Go back to the description cards page</a>
<h1>Details of <?=$row['name']?> :</h1>
<table>
    <tr>
        <th>id</th>
        <th>category</th>
        <th>name</th>
        <th>localisation</th>
        <th>rating</th>
        <th>desc</th>
        <th>imgSrc</th>
        <th>imgAlt</th>
        <th>imgTitle</th>
        <th>schedule</th>
        <th>price</th>
    </tr>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['category']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['localisation']?></td>
        <td><?=$row['rating']?></td>
        <td><?=nl2br($row['desc'])?></td>
        <td><?=$row['imgSrc']?></td>
        <td><?=$row['imgAlt']?></td>
        <td><?=$row['imgTitle']?></td>
        <td><?=$row['schedule']?></td>
        <td><?=$row['price']?></td>
    </tr>
</table>
<br>
<a href="editDescCards.php?id=<?=$row['id']?>">edit</a>
<a href="deleteDescCards.php?id=<?=$row['id']?>">delete</a>
</body>
</html>