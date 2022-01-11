<?php
require __DIR__ . "./../model/entity/User.class.php";
class UserCtrl extends User
{
    public function getUser(string $username): ?array
    {
        return parent::getUser($username);
    }
    public function setUser(string $userName, string $password, bool $isAdmin): void
    {
        parent::setUser($userName, $password, $isAdmin);
    }
    public function getConnectedUser(int|string $id): ?array{
        return parent::getCurrentUser($id);
    }
}
