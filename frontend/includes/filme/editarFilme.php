<?php
include_once __DIR__ . '/../../services/metodos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_filme = $filme['id_filme'];
    $id_diretor = $_POST['id_diretor'];
    $id_faixa_etaria = $_POST['id_faixa_etaria'];
    $id_capa = get("http://localhost:8000/filme/$id_filme")[0]['id_capa'];
    $nome = $_POST['nome'];
    $lancamento = $_POST['lancamento'];

    $data = ['id_diretor' => $id_diretor, 'id_faixa_etaria' => $id_faixa_etaria, 'id_capa' => $id_capa, 'nome' => $nome, 'lancamento' => $lancamento];

    $result = put("http://localhost:8000/filme/$id_filme", $data);

    header("Location: ./");
    exit();
}

$filmes = get("http://localhost:8000/filme");

$diretores = get("http://localhost:8000/diretor");
$faixaEtarias = get("http://localhost:8000/faixaEtaria");
?>

<form method="POST">
    <div class="flex gap-2 flex-col items-start">
        <div>
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
        </div>
        <input class="border rounded p-2 text-sm outline-none" name="nome" class="mb-4" type="text" value="<?= htmlspecialchars($filme['nome']) ?>">
        <input class="border rounded p-2 text-sm outline-none" name="lancamento" class="mb-4" type="text" value="<?= htmlspecialchars($filme['lancamento']) ?>">
        <button class="p-2 text-sm bg-black text-white rounded" type="submit">Enviar</button>
    </div>
</form>