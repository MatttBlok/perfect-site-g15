<?php
require_once '../../../includes/connection.php';
require_once '../../../includes/functions.php';

if (!isLogged()) {
	header("location: ../login.php");
	die();
}

$request = 'SELECT `id`, `name` FROM `partners`;';

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
<h2>Your current partners:</h2>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
    </tr>
    <?php while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['id']?></td>
            <td><a href="showPartner.php?id=<?=$row['id']?>"><?=$row['name']?></a></td>
        </tr>
    <?php endwhile ?>
</table>
<br>
<h2>Add a partner here:</h2>
<form action="doaddPartner.php" method="post">
    <label for="name">name</label> <input type="text" name="name">
    <label for="logoSrc">logoSrc</label> <input type="text" name="logoSrc">
    <label for="logoAlt">logoAlt</label> <input type="text" name="logoAlt">
    <label for="logoTitle">logoTitle</label> <input type="text" name="logoTitle">
    <input type="submit" value="add this partner">
</form>
<?php if (isset($_GET['error'])) :?>
    <p class="error"><?=$_GET['error']?></p>
<?php endif; ?>
</body>
</html>