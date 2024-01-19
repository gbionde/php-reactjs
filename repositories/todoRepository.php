<?php
interface TodoRepositoryInterface
{
    public function addTodo($text);
    public function getAllTodos();
}

class TodoRepository implements TodoRepositoryInterface
{
    private $todos = [];

    public function addTodo($text)
    {
        $todo = [
            'id' => uniqid(),
            'text' => $text,
        ];

        $this->todos[] = $todo;
        return $todo;
    }

    public function getAllTodos()
    {
        return $this->todos;
    }
}
