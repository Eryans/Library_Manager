<?php

function checkUserConnexion(string $userName, string $password): bool
{
    $db = new DAO();
    $result = $db->getPassword($userName);
    if (!empty($result) && password_verify($password, trim($result))) {
        return true;
    }
    return false;
}
echo "<h1>Logging Controller</h1>";


if (isset($_POST["submitConnexion"])) {
    $db = new DAO();
    $userName = htmlspecialchars($_POST["userName"]);
    $userInfo = $db->getUser($userName);
    $loggingAttempt = checkUserConnexion($userName, htmlspecialchars($_POST["password"]));
    if ($loggingAttempt) {
        $_SESSION["userID"] = $userInfo["id"];
        header("Location:index.php?action=main");
    } else {
        echo "UserName or password inccorect.";
    }
}
require __DIR__ . "/../view/view_login.php";
