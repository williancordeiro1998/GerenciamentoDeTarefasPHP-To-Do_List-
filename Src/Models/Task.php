<?php

namespace Src\Models;

use PDO;

class Task
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=gerenciamento_de_tarefas', 'root', '');
    }

    public function getAllTasks($userId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM tasks WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTask($userId, $title)
    {
        $stmt = $this->pdo->prepare('INSERT INTO tasks (user_id, title) VALUES (:user_id, :title)');
        $stmt->execute(['user_id' => $userId, 'title' => $title]);
    }

    public function deleteTask($taskId)
    {
        $stmt = $this->pdo->prepare('DELETE FROM tasks WHERE id = :id');
        $stmt->execute(['id' => $taskId]);
    }
}
