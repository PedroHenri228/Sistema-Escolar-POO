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
    <a href="nova_turma" class="btn btn-primary mb-3">Cadastrar nova turma</a>

    <table class="table table-bordered">
        <thead class="table-dark">
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
                            <a href="atividades?codigo=<?= urlencode($class['codigo']) ?>" class="btn btn-info">Ver atividades</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir<?= $class['codigo'] ?>">
                                Apagar turma
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-success">Cadastrar Curso</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modalExcluir<?= $class['codigo'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $class['codigo'] ?>"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalLabel<?= $class['codigo'] ?>">Confirmar Exclusão</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja realmente apagar a turma <strong><?= htmlspecialchars($class['nome']) ?></strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="delete/<?= urlencode($class['codigo']) ?>" class="btn btn-danger">Apagar</a>


                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Nenhuma turma encontrada.</td>
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
