<?php
include_once __DIR__ . '/../../services/metodos.php';

$filmes = get("http://localhost:8000/filme");
?>

<div id="filmes" class="m-6 p-6 flex flex-col gap-5">
    <?php if (!empty($filmes)): ?>
        <?php foreach ($filmes as $filme): ?>
            <?php $id_filme = $filme['id_filme']; ?>
            <?php $id_diretor = $filme['id_diretor']; ?>
            <?php $id_faixa_etaria = $filme['id_faixa_etaria']; ?>
            <?php $id_capa = $filme['id_capa']; ?>
            <?php $showModal = isset($_GET[$id_filme]) && $_GET[$id_filme] == 'true'; ?>
            <div class="p-6 flex gap-6 border rounded">
                <img class="w-32" src="<?= htmlspecialchars("/" . get("http://localhost:8000/capa/$id_capa")[0]['caminho']) ?>">
                <div class="w-full flex items-center justify-between">
                    <div>
                        <p class="font-bold text-2xl"><?= htmlspecialchars($filme['nome']) ?></p>
                        <p><?= htmlspecialchars(get("http://localhost:8000/diretor/$id_diretor")[0]['nome']) ?></p>
                        <p><?= htmlspecialchars($filme['lancamento']) ?></p>
                        <p><?= htmlspecialchars(get("http://localhost:8000/faixaEtaria/$id_faixa_etaria")[0]['idade']) ?></p>
                    </div>
                    <div class="flex gap-4">
                        <a href="<?php  echo '?'.$id_filme.'=true' ?>" class="w-20 h-10 flex items-center justify-center rounded text-white bg-black">Editar</a>
                        <form action="/includes/filme/removerFilme.php" method="POST">
                            <input type="hidden" name="id_filme" value="<?php echo $id_filme; ?>">
                            <button type="submit" class="w-20 h-10 rounded text-white bg-red-600">Excluir</button>
                        </form>
                    </div>
                </div>
                <?php if ($showModal): ?>
                <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <div class="bg-white p-8 rounded shadow-lg max-w-sm w-full">
                        <h2 class="text-xl font-bold mb-4"><?= htmlspecialchars("Editar " . $filme['nome']) ?></h2>
                        <?php include __DIR__ . '/editarFilme.php' ?>
                        <br>
                        <a href="./" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Fechar</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum Filme encontrado!</p>
    <?php endif; ?>
</div>