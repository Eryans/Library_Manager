<?php 
require_once __DIR__."./../../controller/UserCtrl.class.php";
require_once __DIR__."./../../controller/LoginCtrl.class.php";
require_once __DIR__."./../../view/LoginView.class.php";

echo "<h1>Logging page</h1>";

$user = new UserCtrl();
$logger = new LoginCtrl();
$display = new LoginView();

if (isset($_POST["submitConnexion"])){
    $userName = htmlspecialchars($_POST["userName"]);
    $userInfo = $user->getUser($userName);
    if ($userInfo){
        $loggingAttempt = $logger->checkUserConnexion($userName,htmlspecialchars($_POST["password"]));
        if ($loggingAttempt){
            session_start();
            $_SESSION["userID"] = $userInfo["id"];
            var_dump($_SESSION["userID"]);
        }
    } else {
        echo "UserName or password inccorect.";
    }
}

$display->displayLoginForm();