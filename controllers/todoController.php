<?php
// todoController.php
class TodoController
{
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function addTodo($data)
    {
        error_log('Received data in addTodo: ' . print_r($data, true));

        // Add a new todo through the repository
        $todo = $this->todoRepository->addTodo($data['text']);

        // Return the added todo
        echo json_encode($todo);
    }

    public function listTodos()
    {
        // Retrieve all todos through the repository
        $todos = $this->todoRepository->getAllTodos();

        echo json_encode($todos);
    }
}