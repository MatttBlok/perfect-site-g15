<form action="./doConnect.php" method="post">
    <div>
        <input type="text" placeholder="Name" name="name" />
    </div>
    <div>
        <input type="password" placeholder="Password" name="password" />
    </div>
    <div>
        <input type="submit" value="Submit" />
    </div>
</form>
<?php if (isset($_GET['error'])) :?>
    <p class="error"><?=$_GET['error']?></p>
<?php endif; ?>