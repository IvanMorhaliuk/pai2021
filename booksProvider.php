<?php
require_once __DIR__ . "/src/controllers/BookController.php";
$bookController = new BookController();
echo json_encode($bookController->getBookList());