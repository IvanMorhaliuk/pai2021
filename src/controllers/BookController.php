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

    public function addbook(){
        session_start();
        if(!$this->validateUser()) die();
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
            $this->bookRepository->addBook($book,$_SESSION['id']);
            //render page
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/shelf");
        }
        //render if error
        $this->render("shared/components/add-book","add-book",['messages' => $this->messages]);
    }

    public function getallbooks(){
        session_start();
        if(!$this->validateUser()) die();
        $books = $this->bookRepository->getAllBooks();
        //render page
        echo json_encode($books);
    }
    public function getalluserbooks(){
        session_start();
        if(!$this->validateUser()) die();
        $books = $this->bookRepository->getAllUserBooks($_SESSION['email']);
        //render page
        echo json_encode($books);
    }
    public function searchbook(){
        session_start();
        if(!$this->validateUser()) die();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        if($contentType === 'application/json'){
            $content = file_get_contents("php://input");
            $decoded = json_decode($content,true);
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($this->bookRepository->getBookByTitle($decoded['search']));
        }
    }

    public function updatecontent(){
        session_start();
        if(!$this->validateUser()) die();
        $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
        if($contentType === 'application/json'){
            $content = file_get_contents("php://input");
            $decoded = json_decode($content,true);
            $this->bookRepository->updateContent($decoded['id'],htmlentities($decoded['content']));
            header('Content-Type: application/json');
            http_response_code(200);
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
}