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
`id`, `name`, `logoSrc`, `logoAlt`, `logoTitle` 
FROM 
`partners` 
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
<a href="./">Go back to the partner page</a>
<h1>Details of <?=$row['name']?> :</h1>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>logoSrc</th>
        <th>logoAlt</th>
        <th>logoTitle</th>
    </tr>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['logoSrc']?></td>
        <td><?=$row['logoAlt']?></td>
        <td><?=$row['logoTitle']?></td>
    </tr>
</table>
<br>
<a href="editPartner.php?id=<?=$row['id']?>">edit</a>
<a href="deletePartner.php?id=<?=$row['id']?>">delete</a>
</body>
</html>