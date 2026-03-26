<?php
require_once __DIR__ . '/core/Router.php';

$router = new Router();

$router->get('/', 'home.php');
$router->get('/weather', 'weather.php');
$router->get('/crypto', 'crypto.php');

$router->resolve($_SERVER['REQUEST_URI']);
