<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <title>Login page</title>
</head>
<body>

</body>
</html>
<!--<form action="./doConnect.php" method="post">
    <div>
        <input type="text" placeholder="Name" name="name" />
    </div>
    <div>
        <input type="password" placeholder="Password" name="password" />
    </div>
    <div>
        <input type="submit" value="Submit" />
    </div>
</form>-->

<div style="margin-top:40px;width:100vw;height: 240px;display: flex;justify-content: center;">
    <form style="width: 240px;height: 240px;" action="./doConnect.php" method="post">
        <div class="form-group">
            <label for="usr">Name:</label>
            <input style="width: 240px;" type="text" class="form-control" id="usr" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input style="width: 240px;" type="password" class="form-control" id="pwd" placeholder="Password" name="password">
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Submit" />
        </div>
    </form>
</div>
<?php if (isset($_GET['error'])) :?>
    <p style="text-align: center;color: red;" class="error"><?=$_GET['error']?></p>
<?php endif; ?>