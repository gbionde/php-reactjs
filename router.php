<?php
// router.php

// include: 
// if the file is not found, a warning is issued 
include 'cors.php';

// require_once: 
// if the file is not found or encounters an error during inclusion, 
// a fatal error is issued, and script execution stops
require_once './controllers/todoController.php';
require_once './repositories/todoRepository.php'; 

// get the request method and put it into a variable
$method = $_SERVER['REQUEST_METHOD'];

$todoRepository = new TodoRepository(); 
$todoController = new TodoController($todoRepository);

// forward the request to the correct endpoint
switch ($method) {
    case 'GET':
        $todoController->listTodos();
        break;

    case 'POST':
        // file_get_contents:
        // reads raw data from the request body.
        // in the case of a POST request with a JSON payload, this is where the JSON data resides.
        // the php://input stream allows reading raw data from the request body.
        $data = json_decode(file_get_contents('php://input'), true);
        $todoController->addTodo($data);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
        break;
}
