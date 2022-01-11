<?php
require_once __DIR__ . "./../Dbh.class.php";
class User extends Dbh
{
    protected $db;
    public function __construct()
    {
        $this->db = $this->connectToDatabase();
    }
    protected function getUser(string $userName): ?array
    {
        try {
            $sql = "SELECT * FROM User WHERE userName = :userName";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["userName" => $userName]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDO $e) {
            die("error getting User" . $e);
        }
    }
    protected function getCurrentUser(string|int $id): ?array
    {
        try {
            $sql = "SELECT * FROM User WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["id" => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDO $e) {
            die("error getting current User" . $e);
        }
    }
    protected function setUser(string $userName, string $password, bool $isAdmin): void
    {
        // Use password_hash func to encrypt password to convert to binary for database
        $hash = password_hash($password,PASSWORD_BCRYPT);
        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO User(userName,password,is_admin) VALUES(:userName,:password,:isAdmin)";
            $stmt = $this->db->prepare($sql);
            // Bind Param to prepared stmt
            $stmt->bindParam("userName", $userName, PDO::PARAM_STR);
            $stmt->bindParam("password", $hash );
            $stmt->bindParam("isAdmin", $isAdmin, PDO::PARAM_BOOL);
            $stmt->execute();
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            die("shit happend when setting new user: " . $e);
        }
    }
    
}
