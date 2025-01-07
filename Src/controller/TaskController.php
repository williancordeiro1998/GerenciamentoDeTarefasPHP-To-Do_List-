<?php

namespace Src\controller;

use Src\Models\Task;

class TaskController
{
    private $taskModel;

    public function __construct()
    {
        $this->taskModel = new Task();
    }

    public function list()
    {
        // Verifica se o usuário está logado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit();
        }

        // Obtenha as tarefas do banco de dados
        $tasks = $this->taskModel->getAllTasks($_SESSION['user_id']);

        // Inclui a view de gerenciamento de tarefas
        require_once __DIR__ . '/../views/tasks.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';

            if (!empty($title)) {
                $this->taskModel->createTask($_SESSION['user_id'], $title);
            }

            header('Location: ?controller=task&action=list');
            exit();
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $taskId = $_GET['id'];
            $this->taskModel->deleteTask($taskId);
        }

        header('Location: ?controller=task&action=list');
        exit();
    }
}
