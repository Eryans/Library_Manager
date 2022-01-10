<?php
require __DIR__ . "./../model/entity/User.class.php";
class UserCtrl extends User
{
    public function getUser(): array
    {
        return parent::getUser();
    }
    public function setUser(string $userName, string $password, bool $isAdmin): void
    {
        parent::setUser($userName, $password, $isAdmin);
    }
}
