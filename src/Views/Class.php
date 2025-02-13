<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turmas</title>
    <link rel="stylesheet" href="src/Public/css/style.css">
</head>
<body>

    <h2>Lista de Turmas </h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $class): ?>
                    <tr>
                        <td><?= htmlspecialchars($class['codigo']) ?></td>
                        <td><?= htmlspecialchars($class['nome']) ?></td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum turma encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
            

    <script src="src/Public/js/script.js"></script>
</body>
</html>