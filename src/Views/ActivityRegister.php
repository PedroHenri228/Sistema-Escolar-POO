<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Atividade</title>
</head>
<body>
    <form action="nova_atividade?codigo=<?= urlencode($id) ?>" method="post">
        <?php if (!empty($id)): ?>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" required>
            <br>
            <label for="date">Data</label>
            <input type="date" name="date" id="date" required>
            <br>
            <input type="hidden" name="turma_codigo" value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">
            <br>
            <button type="submit">Cadastrar</button>
        <?php else: ?>
            <p>Erro: Código da turma não informado.</p>
        <?php endif; ?>
    </form>
</body>
</html>

