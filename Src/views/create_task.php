<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Nova Tarefa</title>
</head>
<body>
<h1>Criar Nova Tarefa</h1>

<form method="POST" action="?controller=task&action=create">
    <label for="title">Título da Tarefa:</label>
    <input type="text" name="title" id="title" placeholder="Digite o título da tarefa" required>
    <button type="submit">Criar</button>
</form>

<p>
    <a href="?controller=task&action=list">Voltar para a lista de tarefas</a>
</p>
</body>
</html>
