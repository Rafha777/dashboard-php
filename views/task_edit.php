<h2>Editar Tarefa</h2>
<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>" required><br>
    <textarea name="description"><?= htmlspecialchars($task['description']) ?></textarea><br>
    <select name="status">
        <option value="pending" <?= $task['status']=='pending'?'selected':'' ?>>Pendente</option>
        <option value="done" <?= $task['status']=='done'?'selected':'' ?>>Concluída</option>
    </select><br>
    <button type="submit">Atualizar</button>
</form>
<a href="index.php?page=dashboard">Voltar</a>
