<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Crie uma conta</title>
</head>
<body>
<h1>Crie uma conta</h1>
<form action="?controller=authentication&action=register" method="POST">
    <input type="text" name="username" placeholder="Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Registrar</button>
</form>
<a href="?controller=authentication&action=login">Já possui uma conta? Faça o login</a>
</body>
</html>
