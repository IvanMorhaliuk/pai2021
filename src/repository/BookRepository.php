<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Book.php';


class BookRepository extends Repository
{
    public function getBook(int $id) : ?Book {
        $stmt = $this->database->connect()->prepare('
            SELECT  * FROM public.books WHERE id = :id
        ');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($book === false){
            return null;
        }
        return new Book(
            $book["title"],
            $book["description"],
            $book["cover_src"],
            $book["created_at"],
            $book["content"],
        );
    }

    /*public function getAllUserBooks(): ?array{

    }*/

    public function getAllBooks(): ?array{
        $result = [];
        $statement = $this->database->connect()->prepare(
            'SELECT  * FROM public.books'
        );
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($books === false){
            return null;
        }
        foreach ($books as $book){
            $result[] = new Book(
                $book["title"],
                $book["description"],
                $book["cover_src"],
                $book["created_at"],
                html_entity_decode($book["content"]),
                $book['id'],
            );
        }
        return $result;
    }

    public function getBookByTitle(string $searchStr){
        $result = [];
        $searchStr = '%'.strtolower($searchStr).'%';
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.books WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $statement->bindParam(':search',$searchStr,PDO::PARAM_STR);
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_ASSOC);
        if ($books === false){
            return null;
        }
        foreach ($books as $book){
            $result[] = new Book(
                $book["title"],
                $book["description"],
                $book["cover_src"],
                $book["created_at"],
                html_entity_decode($book["content"]),
                $book['id']
            );
        }
        return $result;
    }

    public function addBook(Book $book):void{
        $date = new DateTime();
        $statement = $this->database->connect()->prepare('
            INSERT INTO public.books (title,description,cover_src,created_at,content)
            VALUES (?,?,?,?,?)
        ');
        $statement->execute([
            $book->getTitle(),
            $book->getDescription(),
            $book->getCoverSrc(),
            $date->format('Y-m-d'),
            $book->getContentHTML(),
        ]);
    }
    public function updateContent(int $id,$content){
        $content = htmlentities($content);
        $statement = $this->database->connect()->prepare('
            UPDATE public.books SET "content" = :content WHERE id = :id
        ');
        $statement->bindParam(':content',$content,PDO::PARAM_STR);
        $statement->bindParam(':id',$id);
        $statement->execute();
    }
}