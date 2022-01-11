<?php
require_once __DIR__ . "/../model/entity/Login.class.php";

class LoginCtrl extends Login
{
    public function __construct()
    {
        parent::__construct();
    }
    public function checkUserConnexion(string $userName, string $password): bool
    {
        $result = $this->getPassword($userName);
        if (!empty($result) && password_verify($password, trim($result))) {
            return true;
        }
        return false;
    }
}
