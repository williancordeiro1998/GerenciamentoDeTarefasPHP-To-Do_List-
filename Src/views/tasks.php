<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Tarefas</title>
</head>
<body>
<h1>Suas Tarefas</h1>

<?php if (isset($tasks) && is_array($tasks)): ?>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?= htmlspecialchars($task['title']) ?>
                <a href="?controller=task&action=delete&id=<?= htmlspecialchars($task['id']) ?>">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Não há tarefas cadastradas.</p>
<?php endif; ?>

<form method="POST" action="?controller=task&action=create">
    <input type="text" name="title" placeholder="Nova tarefa" required>
    <button type="submit">Adicionar</button>
</form>
</body>
</html>
