<?php
include_once __DIR__ . '/../../services/metodos.php';

$emprestimos = get("http://localhost:8000/emprestimo");
?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon"/>
    <title>Locaflix</title>
</head>
<body>
    <div id="emprestimos" class="m-6 p-6 flex flex-col gap-5">
        <?php if (!empty($emprestimos)): ?>
            <?php foreach ($emprestimos as $emprestimo): ?>
                <?php $id_emprestimo = $emprestimo['id_emprestimo']; ?>
                <?php $id_cliente = $emprestimo['id_cliente']; ?>
                <?php $id_status = $emprestimo['id_status']; ?>
                <?php $id_filme = $emprestimo['id_filme']; ?>
                <div class="p-6 flex flex-col border rounded">
                    <p class="font-medium text-lg">Cliente</p>
                    <p><?= htmlspecialchars(get("http://localhost:8000/cliente/$id_cliente")[0]['nome']) ?></p>
                    <p class="font-medium text-lg">Estado</p>
                    <p><?= htmlspecialchars(get("http://localhost:8000/status/$id_status")[0]['tipo']) ?></p>
                    <p class="font-medium text-lg">Filme</p>
                    <p><?= htmlspecialchars(get("http://localhost:8000/filme/$id_filme")[0]['nome']) ?></p>
                    <p class="font-medium text-lg">Data do emprestimo</p>
                    <p><?= htmlspecialchars($emprestimo['data_emprestimo']) ?></p>
                    <p class="font-medium text-lg">Data da devolução</p>
                    <p><?= htmlspecialchars($emprestimo['data_devolucao']) ?></p>
                    <form action="/includes/emprestimo/removerEmprestimo.php" method="POST">
                        <input type="hidden" name="id_emprestimo" value="<?php echo $id_emprestimo; ?>">
                        <button type="submit" class="w-20 h-10 rounded text-white bg-red-600">Excluir</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum emprestimo encontrado!</p>
        <?php endif; ?>
    </div>
</body>
</html>