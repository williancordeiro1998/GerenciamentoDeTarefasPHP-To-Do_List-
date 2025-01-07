<!-- src/views/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form method="POST">
    <input type="text" name="username" placeholder="Usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Login</button>
</form>

<?php if (isset($error_message)): ?>
    <p style="color: red;"><?= $error_message ?></p>
<?php endif; ?>
</body>
</html>
