<?php
require_once 'AppController.php';
require_once __DIR__ . "/../models/Book.php";
class BookController extends AppController
{

    public function getBookList(): array
    {
        $booksList = [
            new Book("title 1", "desc 1", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 2", "desc 2", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 3", "desc 3", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
            new Book("title 4", "desc 4", "/public/img/bookitem.png", "20/20/2020"),
        ];
        return $booksList;
    }



}