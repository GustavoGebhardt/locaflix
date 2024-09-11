<?php
include_once __DIR__ . '/../../services/metodos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $data = ['nome' => $nome, 'email' => $email];

    $result = post("http://localhost:8000/cliente", $data);

    header("Location: ./");
    exit();
}
?>

<form method="POST" enctype="multipart/form-data" class="w-96 p-6 flex flex-col gap-6 border rounded">
    <input
        type="text"
        name="nome"
        placeholder="Nome do Cliente"
        class="border rounded p-2 text-sm outline-none"
        required
    >
    <input
        type="text"
        name="email"
        placeholder="Email do Cliente"
        class="border rounded p-2 text-sm outline-none"
        required
    >
    <button type="submit" class="p-2 text-sm bg-black text-white rounded">Cadastrar Cliente</button>
</form>