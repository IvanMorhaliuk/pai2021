<?php
require_once 'AppController.php';
require_once __DIR__ . "/../models/Book.php";
require_once __DIR__ . "/../repository/BookRepository.php";
class BookController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpg'];
    const UPLOAD_DIRECTORY = __DIR__ . '/../../public/uploads/';
    private BookRepository $bookRepository;
    private array $messages = [];

    public function __construct()
    {
        parent::__construct();
        $this->bookRepository = new BookRepository();
    }

    public function addBook(){
        if($this->isPost() && is_uploaded_file($_FILES["cover"]['tmp_name']) && $this->validate($_FILES["cover"])){
            move_uploaded_file(
                $_FILES["cover"]['tmp_name'],
                self::UPLOAD_DIRECTORY . $_FILES["cover"]['name']
            );
            $coverSrc = "/public/uploads/" . $_FILES['cover']['name'];
            $content = "<h1> ". $_POST['title'] . "</h1>";
            $book = new Book(
                $_POST['title'],$_POST['description'],$coverSrc,
                (new DateTime())->format('Y-m-d'),htmlentities($content));
            $this->bookRepository->addBook($book);
            //render page
            echo "added book -> " . json_encode($book);
            /*return $this->render("shared/components/add-book","add-book",
                ['messages' => $this->messages]);*/
        }
        //render if error
        $this->render("shared/components/add-book","add-book",['messages' => $this->messages]);
    }

    public function getAllBooks(){
        $books = $this->bookRepository->getAllBooks();
        //render page
        echo json_encode($books);
    }
    public function searchbook(){
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        if($contentType === 'application/json'){
            $content = file_get_contents("php://input");
            $decoded = json_decode($content,true);
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($this->bookRepository->getBookByTitle($decoded['search']));
            /*$decoded['bookContentHtml'] .= "hello";
            echo json_encode($decoded['bookContentHtml']);*/
        }
    }

    public function updatecontent(){
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        if($contentType === 'application/json'){
            $content = file_get_contents("php://input");
            $decoded = json_decode($content,true);
            $this->bookRepository->updateContent($decoded['id'],htmlentities($decoded['content']));
            header('Content-Type: application/json');
            http_response_code(200);
            /*$decoded['content'] = htmlentities($decoded['content']);
            echo json_encode($decoded);*/
            /*$decoded['bookContentHtml'] .= "hello";
            echo json_encode($decoded['bookContentHtml']);*/
        }
    }

    private function validate($cover):bool
    {
        if($cover['size'] > self::MAX_FILE_SIZE){
            $this->messages[] = "File is too large";
            return false;
        }
        if(!isset($cover['type']) && !in_array($cover['type'], self::SUPPORTED_TYPES)){
            $this->messages[] = "File type is not supported";
            return false;
        }
        return true;
    }

    /*public function getBookList(): array
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
            $book->setId(array_search($book,$booksList));
        }
        return $booksList;
    }*/


}