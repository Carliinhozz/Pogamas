<?php
use Carlos\Auth\App\Router;
$router= new Router;

$router->get('/','views/home.php');
$router->get('/register','views/register.php');
$router->get('/login','views/login.php');
$router->get('/addbook','views/aadbook.php');
$router->get('/lendbook','views/lendbook.php');

$router->post('/register','views/register.php');
$router->post('/login','views/login.php');
$router->post('/addbook','views/aadbook.php');
$router->post('/lendbook','views/lendbook.php');

$router->get('/showpage','views/showpage.php');
$router->get('/error','views/error.php');





return $router;