<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turmas</title>
    <link rel="stylesheet" href="src/Public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <h2>Lista de Turmas</h2>
    <a href="../nova_atividade" class="btn btn-primary mb-3">Cadastrar nova atividade</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Identificação da Ativiade</th>
                <th>Descrição</th>
                <th>Data</th>

            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $class): ?>
                    <tr>
                        <td><?= htmlspecialchars($class['codigo']) ?></td>
                        <td><?= htmlspecialchars($class['descricao']) ?></td>
                        <td><?= htmlspecialchars($class['data']) ?></td>
                    </tr>

                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhuma atividade encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="src/Public/js/script.js"></script>
</body>

</html>
