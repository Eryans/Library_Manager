<?php
require_once __DIR__ . "./../Dbh.class.php";
class Login extends Dbh
{
    protected $db;
    public function __construct()
    {
        $this->db = $this->connectToDatabase();
    }
    protected function getPassword($userName): ?string
    {
        try {
            $sql = "SELECT password FROM User WHERE userName = :userName";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["userName" => $userName]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["password"];
        } catch (PDOException $e) {
            die("Something went wrong ".$e);
        }
    }
}
