<?php
// src/models/User.php

namespace Src\Models;

use PDO;

class User
{
    // Conexão com o banco de dados
    private static function getDBConnection()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=gerenciamento_de_tarefas', 'root', ''); // Ajuste as credenciais conforme necessário
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function findByUsername($username)
    {
        $pdo = self::getDBConnection();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna os dados do usuário ou null
    }
}
