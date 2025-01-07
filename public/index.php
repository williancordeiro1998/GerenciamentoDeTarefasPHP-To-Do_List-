<?php
// index.php

// Incluir o autoload do Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Usar o namespace correto para os controladores
use Src\Controller\AuthenticationController;
use Src\Controller\TaskController;

// Definir a rota
$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'login';

// Iniciar a sessão
session_start();

// Instanciar o controlador com base na rota
switch ($controller) {
    case 'user':
        // Importa o controlador de autenticação para o login
        $controllerObj = new AuthenticationController();
        break;

    case 'task':
        // Importa o controlador de tarefas
        $controllerObj = new TaskController();
        break;

    default:
        // Caso o controlador não seja reconhecido
        die("Controller inválido");
}

// Chamar o método correspondente no controlador
if (method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    die("Ação inválida");
}
