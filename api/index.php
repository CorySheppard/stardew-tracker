<?php

declare(strict_types=1);
include './propelSetup.php';

spl_autoload_register(function ($class) {
    $file = __DIR__ . "/src/$class.php";
    if (file_exists($file)) {
        require $file;
    }
});

set_error_handler("ErrorHandler::handleError");
set_exception_handler("ErrorHandler::handleException");

header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER['REQUEST_URI']);

// Writing this only for users currently, this will change!
if ($parts[1] != "users") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$gateway = new UserGateway;
$controller = new UserController($gateway);

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);