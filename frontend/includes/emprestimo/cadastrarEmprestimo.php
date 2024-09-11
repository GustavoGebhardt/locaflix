<?php
include_once __DIR__ . '/../../services/metodos.php';
include_once __DIR__ . '/../../services/validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $id_status = $_POST['id_status'];
    $id_filme = $_POST['id_filme'];
    $data_emprestimo = $_POST['data_emprestimo'];
    validateData($data_emprestimo);
    $data_devolucao = $_POST['data_devolucao'];
    validateWithDate($data_devolucao);

    $data = ['id_cliente' => $id_cliente, 'id_status' => $id_status, 'id_filme' => $id_filme, 'data_emprestimo' => $data_emprestimo, 'data_devolucao' => $data_devolucao];

    $result = post("http://localhost:8000/emprestimo", $data);

    //if ($result && $result['message'] === 'Post created') {
        header("Location: ./"); // Redireciona para a página principal para ver o novo post
        exit();
    //}
}

$clientes = get("http://localhost:8000/cliente");
$status = get("http://localhost:8000/status");
$filmes = get("http://localhost:8000/filme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Create New Filme</title>
</head>
<body>
    <form method="POST" class="w-96 p-6 flex flex-col gap-6 border rounded">
        <select name="id_cliente" class="appearance-none border rounded p-2 text-sm outline-none">
            <?php if (!empty($clientes)): ?>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= htmlspecialchars($cliente['id_cliente']) ?>"><?= htmlspecialchars($cliente['nome']) ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="" disabled>Nenhum Cliente</option>
            <?php endif; ?>
        </select>
        <select name="id_status" class="appearance-none border rounded p-2 text-sm outline-none">
            <?php if (!empty($status)): ?>
                <?php foreach ($status as $stat): ?>
                    <option value="<?= htmlspecialchars($stat['id_status']) ?>"><?= htmlspecialchars($stat['tipo']) ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="" disabled>Nenhum Status</option>
            <?php endif; ?>
        </select>
        <select name="id_filme" class="appearance-none border rounded p-2 text-sm outline-none">
            <?php if (!empty($filmes)): ?>
                <?php foreach ($filmes as $filme): ?>
                    <option value="<?= htmlspecialchars($filme['id_filme']) ?>"><?= htmlspecialchars($filme['nome']) ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="" disabled>Nenhum Filme</option>
            <?php endif; ?>
        </select>
        <input
            type="text"
            name="data_emprestimo"
            placeholder="Data emprestimo"
            class="border rounded p-2 text-sm outline-none"
            required
        >
        <input
            type="text"
            name="data_devolucao"
            placeholder="Data devolucao"
            class="border rounded p-2 text-sm outline-none"
            required
        >
        <button type="submit" class="p-2 text-sm bg-black text-white rounded">Cadastrar Emprestimo</button>
    </form>
</body>
</html>
