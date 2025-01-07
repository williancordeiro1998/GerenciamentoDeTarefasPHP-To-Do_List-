<?php

namespace Src\controller;

use Src\Models\User;

class AuthenticationController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login()
    {
        // Verifica se a requisição é POST (quando o usuário tenta logar)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->findByUsername($username);

            // Verifica se o usuário existe e se a senha é válida
            if ($user && password_verify($password, $user['password'])) {
                // Armazena informações do usuário na sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redireciona para a página de boas-vindas
                header('Location: ?controller=user&action=welcome');
                exit();
            } else {
                $error_message = "Credenciais inválidas!";
            }
        }

        // Exibe a página de login
        require_once __DIR__ . '/../views/login.php';
    }

    public function welcome()
    {
        // Verifica se o usuário está logado
        if (!isset($_SESSION['user_id'])) {
            header('Location: ?controller=user&action=login');
            exit();
        }

        // Exibe a página de boas-vindas
        require_once __DIR__ . '/../views/welcome.php';
    }

    public function logout()
    {
        // Destrói a sessão
        session_destroy();
        header('Location: ?controller=user&action=login');
        exit();
    }
}
