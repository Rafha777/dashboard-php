dashboard.php
<h2>Dashboard</h2>
<a href="index.php?page=task_add">Adicionar Tarefa</a>
<a href="index.php?page=logout">Sair</a>
<ul>
<?php foreach($tasks as $task): ?>
    <li>
        <?= htmlspecialchars($task['title']) ?> - <?= $task['status'] ?>
        <a href="index.php?page=task_edit&id=<?= $task['id'] ?>">Editar</a>
        <a href="index.php?page=task_delete&id=<?= $task['id'] ?>">Excluir</a>
    </li>
<?php endforeach; ?>
</ul>
