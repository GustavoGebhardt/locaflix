<?php
include_once __DIR__ . '/../../services/metodos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_FILES['capa'])){
        $capa = $_FILES['capa'];
        $novoArquivo = "public/" . uniqid() . ".png";
        $response = move_uploaded_file($capa["tmp_name"], __DIR__ . "/../../" . $novoArquivo);

        $data = ['caminho' => $novoArquivo,];
        $id_capa = post("http://localhost:8000/capa", $data);
    }

    $id_diretor = $_POST['id_diretor'];
    $id_faixa_etaria = $_POST['id_faixa_etaria'];
    $nome = $_POST['nome'];
    $lancamento = $_POST['lancamento'];

    $data = ['id_diretor' => $id_diretor, 'id_faixa_etaria' => $id_faixa_etaria, 'id_capa' => $id_capa, 'nome' => $nome, 'lancamento' => $lancamento];

    $result = post("http://localhost:8000/filme", $data);

    header("Location: ./");
    exit();
}

$diretores = get("http://localhost:8000/diretor");
$faixaEtarias = get("http://localhost:8000/faixaEtaria");
?>

<form method="POST" enctype="multipart/form-data" class="w-96 p-6 flex flex-col gap-6 border rounded">
    <input name="capa" type="file" class="border rounded p-2 text-sm outline-none">
    <select name="id_diretor" class="appearance-none border rounded p-2 text-sm outline-none">
        <?php if (!empty($diretores)): ?>
            <?php foreach ($diretores as $diretor): ?>
                <option value="<?= htmlspecialchars($diretor['id_diretor']) ?>"><?= htmlspecialchars($diretor['nome']) ?></option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="" disabled>Nenhum Diretor</option>
        <?php endif; ?>
    </select>
    <select name="id_faixa_etaria" class="appearance-none border rounded p-2 text-sm outline-none">
        <?php if (!empty($faixaEtarias)): ?>
            <?php foreach ($faixaEtarias as $faixaEtaria): ?>
                <option value="<?= htmlspecialchars($faixaEtaria['id_faixa_etaria']) ?>"><?= htmlspecialchars($faixaEtaria['idade']) ?></option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="" disabled>Nenhum Diretor</option>
        <?php endif; ?>
    </select>
    <input
        type="text"
        name="nome"
        placeholder="Nome do Filme"
        class="border rounded p-2 text-sm outline-none"
        required
    >
    <input
        type="text"
        name="lancamento"
        placeholder="Data de lançamento"
        class="border rounded p-2 text-sm outline-none"
        required
    >
    <button type="submit" class="p-2 text-sm bg-black text-white rounded">Cadastrar Filme</button>
</form>