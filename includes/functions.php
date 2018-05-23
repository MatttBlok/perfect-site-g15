<?php
function isLogged(): bool
{
    return isset($_COOKIE['admin']);
}

function logOut(): void
{
    setcookie('admin', null, -1);
    header("Location: ./");
}

function connectUser($name, $password, $pdo): bool
{
    $request = "SELECT `id`, `password` FROM `admin` WHERE `name` = :name";

    $stmt = $pdo->prepare($request);
    $stmt->bindValue(":name", $name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (count($result) === 0) {
        return false;
    }
    $rightPassword = $result['password'];
    if ($rightPassword !== $password) {
        return false;
    } else {
        setcookie("admin", serialize(['id' => $result['id'], 'name' => $name]), time() + 60 * 60 * 24 * 365);
        return true;
    }
}