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
        foreach ($booksList as $book){
            $html = "<h1 class='book-entity__title'>{$book->getTitle()}</h1>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur at earum eius excepturi exercitationem ipsa ipsam iste labore laboriosam minus nostrum obcaecati officiis perspiciatis quibusdam quo repellat reprehenderit, saepe, sit ullam vel? Ab at consequuntur dicta dolore error esse eum expedita hic, obcaecati optio perspiciatis quas sequi tempore? Accusantium adipisci amet consequuntur corporis culpa debitis deserunt dolorem enim, eveniet fugit, iusto molestias nostrum quis repellendus, repudiandae vel voluptas? A adipisci, alias aliquid amet asperiores atque, corporis cumque dicta dignissimos dolor doloribus dolorum ducimus est";
            $book->setContentHTML($html);
        }
        return $booksList;
    }



}