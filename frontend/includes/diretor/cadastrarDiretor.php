<?php
include_once __DIR__ . '/../../services/metodos.php';
include_once __DIR__ . '/../../services/validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    $data = ['nome' => $nome];

    $result = post("http://localhost:8000/diretor", $data);

    header("Location: ./");
    exit();
}
?>

<form method="POST" enctype="multipart/form-data" class="w-96 p-6 flex flex-col gap-6 border rounded">
    <input
        type="text"
        name="nome"
        placeholder="Nome do Diretor"
        class="border rounded p-2 text-sm outline-none"
        required
    >
    <button type="submit" class="p-2 text-sm bg-black text-white rounded">Cadastrar Diretor</button>
</form>