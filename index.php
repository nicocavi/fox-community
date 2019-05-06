<?php
require_once('./controllers/Autocargar.php');

$autoload = new Autoload();

$route = isset($_GET['r']) ? $_GET['r'] : 'home';


$foro = new Router($route);

