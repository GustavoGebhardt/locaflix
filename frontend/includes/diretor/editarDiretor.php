<?php
include_once __DIR__ . '/../../services/metodos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_diretor = $diretor['id_diretor'];
    $nome = $_POST['nome'];

    $data = ['nome' => $nome];

    $result = put("http://localhost:8000/diretor/$id_diretor", $data);

    header("Location: ./");
    exit();
}
?>

<form method="POST">
    <div class="flex flex-col items-start">
        <div class="flex gap-2">
            <input class="border rounded p-2 text-sm outline-none" name="nome" class="mb-4" type="text" value="<?= htmlspecialchars($diretor['nome']) ?>">
            <button class="p-2 text-sm bg-black text-white rounded" type="submit">Enviar</button>
        </div>
    </div>
</form>