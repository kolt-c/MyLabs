<?php

$urlParts = parse_url($_SERVER['REQUEST_URI']);

define('PUBLIC_URL', '/' . trim($urlParts['path'], '/') . '/public/');

$template = isset($_GET['page']) ? $_GET['page'] : 'home';
if (!file_exists(__DIR__ . "/templates/{$template}.php")) {
    $template = '404';
}

require_once(__DIR__ . "/templates/{$template}.php");
