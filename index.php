<?php
require 'functions.php';
$urlpath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($urlpath) {
    case '/login' :
        require __DIR__ . '/views/login.php';
        break;
    case '/about' :
        require __DIR__ . '/views/about.php';
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}