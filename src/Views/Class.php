<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turmas</title>
    <link rel="stylesheet" href="src/Public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <h2>Lista de Turmas </h2>

    <table>
        <a href="nova_turma">Cadastrar nova turma</a>
        <thead>
            <tr>
                <th>Identificação da turma</th>
                <th>Nome da turma</th>
                <th>Visualizar atividades da turma</th>
                <th>Apagar turma do registro</th>
                <th>Cadastrar turma em um curso</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $class): ?>
                    <tr>
                        <td><?= htmlspecialchars($class['codigo']) ?></td>
                        <td><?= htmlspecialchars($class['nome']) ?></td>
                        <td>
                            <button>Ver Atividades</button>
                        </td>
                        <td>
                            <button>Apagar Turma</button>
                        </td>
                        <td>
                            <button>Cadastrar Curso</button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Nenhum turma encontrada.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="src/Public/js/script.js"></script>
</body>
</html>