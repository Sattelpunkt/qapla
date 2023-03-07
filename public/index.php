<?php
use Foundation\Request\Session;
use Foundation\Request\Router;
use Foundation\Bootstrap\FlashMessage;

//Grundlegendes Definieren
define('DS', DIRECTORY_SEPARATOR);
define('PROOT', str_replace('public', '', __DIR__));
define('SRC', PROOT . 'src');
define('URL', $_SERVER['SERVER_NAME'] . '/');

require_once SRC . DS . 'foundation' . DS . 'Bootstrap' . DS . 'Autoload.php';


Session::start();

FlashMessage::add('danger', 'Keven ist der Beste');

$router = new Router();

$router->route();
