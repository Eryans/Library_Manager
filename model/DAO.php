<?php
class DAO
{
    private function connectToDatabase()
    {
        try {
            $pdo = new PDO(
                'mysql:host=localhost;
                                dbname=biblioDB;
                                charset=utf8;',
                "biblioAdmin",
                "r34db00k5",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
            $pdo->query("SET autocommit=0");
            return $pdo;
        } catch (Exception $error) {
            die("Error : " . $error->getMessage());
        }
    }
    public function getPassword($userName): ?string
    {
        try {
            $db = $this->connectToDatabase();
            $sql = "SELECT password FROM User WHERE userName = :userName";
            $stmt = $db->prepare($sql);
            $stmt->execute(["userName" => $userName]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result["password"] : "";
        } catch (PDOException $e) {
            die("Something went wrong " . $e);
        }
    }
    public function getUser(string $userName): ?array
    {
        try {
            $db = $this->connectToDatabase();
            $sql = "SELECT id,username,is_admin FROM User WHERE userName = :userName";
            $stmt = $db->prepare($sql);
            $stmt->execute(["userName" => $userName]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : null;
        } catch (PDO $e) {
            die("error getting User" . $e);
        }
    }
    public function getCurrentUser(string|int $id): ?array
    {
        try {
            $db = $this->connectToDatabase();
            $sql = "SELECT * FROM User WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(["id" => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDO $e) {
            die("error getting current User" . $e);
        }
    }
    public function setUser(string $userName, string $password, bool $isAdmin): void
    {
        // Use password_hash func to encrypt password to convert to binary for database
        $hash = password_hash($password, PASSWORD_BCRYPT);
        try {
            $db = $this->connectToDatabase();
            $db->beginTransaction();
            $sql = "INSERT INTO User(userName,password,is_admin) VALUES(:userName,:password,:isAdmin)";
            $stmt = $db->prepare($sql);
            // Bind Param to prepared stmt
            $stmt->bindParam("userName", $userName, PDO::PARAM_STR);
            $stmt->bindParam("password", $hash);
            $stmt->bindParam("isAdmin", $isAdmin, PDO::PARAM_BOOL);
            $stmt->execute();
            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die("shit happend when setting new user: " . $e);
        }
        $db = null;
    }
    public function getBooks(): ?array
    {
        try {
            $db = $this->connectToDatabase();
            $sql = "SELECT * FROM Book";
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result ? $result : null;
        } catch (PDOException $e) {
            die("Something went wrong " . $e);
        }
    }
    public function insertNewBook(string $title, string $author, string $summary, string $releaseDate, string $category, bool $forChild): void
    {
        try {
            $db = $this->connectToDatabase();
            $db->beginTransaction();
            $sql = "INSERT INTO Book(title,author,summary,release_date,category,for_child,available) 
            VALUES(:title,:author,:summary,:release_date,:category,:for_child,TRUE)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                "title" => $title, "author" => $author, "summary" => $summary,
                "release_date" => $releaseDate, "category" => $category, "for_child" => $forChild
            ]);
            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            die("something wrong has happen when setting a new book : " . $e);
        }
    }
}
