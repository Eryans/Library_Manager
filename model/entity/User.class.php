<?php
require_once __DIR__ . "./../Dbh.class.php";
class User extends Dbh
{
    protected function getUser(): array
    {
        try {
            $db = $this->connectToDatabase();
            $sql = "SELECT * FROM User";
            $stmt = $db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDO $e) {
            die("error getting User" . $e);
        }
    }
    protected function setUser(string $userName, string $password, bool $isAdmin): void
    {
        $hash = password_hash($password,PASSWORD_BCRYPT);
        try {
            $db = $this->connectToDatabase();
            $db->beginTransaction();
            $sql = "INSERT INTO User(userName,password,is_admin) VALUES(:userName,:password,:isAdmin)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("userName", $userName, PDO::PARAM_STR);
            $stmt->bindParam("password", $hash );
            $stmt->bindParam("isAdmin", $isAdmin, PDO::PARAM_BOOL);
            $stmt->execute();
            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die("shit happend when setting new user: " . $e);
        }
    }
}
