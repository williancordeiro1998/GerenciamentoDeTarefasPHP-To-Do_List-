<!-- src/views/welcome.php -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
</head>
<body>
<h1>Bem-vindo, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>Você está autenticado.</p>
<a href="?controller=task&action=list">Ir para suas tarefas</a>
<a href="?controller=user&action=logout">Sair</a>
</body>
</html>
