<?php
require_once __DIR__."/../model/entity/Book.php";
echo "Hello I am the main controller";

$Library = [];
$db = new DAO();
foreach($db->getBooks() as $book => $value){
    array_push($Library,new Book($value));
}

require __DIR__."/../view/view_main.php";

