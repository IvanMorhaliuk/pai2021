<?php
require 'Routing.php';
$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path,PHP_URL_PATH);
Routing::get('','DefaultController');
Routing::get('register','DefaultController');
Routing::post('registeruser','SecurityController');
Routing::post('login','SecurityController');
Routing::get('profile','SecurityController');
Routing::get('shelf','SecurityController');
Routing::get('search','SecurityController');
Routing::get('statistics','SecurityController');
Routing::get('settings','SecurityController');
Routing::get('logout','SecurityController');


Routing::post('addbook','BookController');
Routing::get('getallbooks','BookController');
Routing::get('getalluserbooks','BookController');
Routing::post('searchbook','BookController');
Routing::post('updatecontent','BookController');
Routing::run($path);

