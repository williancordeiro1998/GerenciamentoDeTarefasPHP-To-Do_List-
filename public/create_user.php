<?php
// Conexão com o banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=gerenciamento_de_tarefas', 'root', ''); // Ajuste as credenciais de conexão conforme necessário

// Defina o nome de usuário e a senha
$username = 'microleste';
$password = 'microleste'; // Senha simples para exemplo

// Crie o hash da senha
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Prepare a consulta SQL para inserir o usuário
$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
$stmt = $pdo->prepare($sql);

// Execute a consulta, passando o nome de usuário e a senha com o hash
$stmt->execute([':username' => $username, ':password' => $hashedPassword]);

echo "Usuário criado com sucesso!";

