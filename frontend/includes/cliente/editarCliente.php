<?php
include_once __DIR__ . '/../../services/metodos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $cliente['id_cliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $data = ['nome' => $nome, 'email' => $email];

    $result = put("http://localhost:8000/cliente/$id_cliente", $data);

    header("Location: ./");
    exit();
}
?>

<form method="POST">
    <div class="flex flex-col items-start">
        <div class="flex flex-col gap-4">
            <input class="border rounded p-2 text-sm outline-none" name="nome" class="mb-4" type="text" value="<?= htmlspecialchars($cliente['nome']) ?>">
            <input class="border rounded p-2 text-sm outline-none" name="email" class="mb-4" type="text" value="<?= htmlspecialchars($cliente['email']) ?>">
            <button class="p-2 text-sm bg-black text-white rounded" type="submit">Enviar</button>
        </div>
    </div>
</form>