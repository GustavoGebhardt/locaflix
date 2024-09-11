<?php
include_once __DIR__ . '/../../services/metodos.php';

$clientes = get("http://localhost:8000/cliente");
?>

<div id="filmes" class="m-6 p-6 flex flex-col gap-5">
    <?php if (!empty($clientes)): ?>
        <?php foreach ($clientes as $cliente): ?>
            <?php $id_cliente = $cliente['id_cliente']; ?>
            <?php $showModal = isset($_GET[$id_cliente]) && $_GET[$id_cliente] == 'true'; ?>
            <div class="p-6 flex gap-6 border rounded">
                <div class="w-full flex items-center justify-between">
                    <div>
                        <p class="font-bold text-xl"><?= htmlspecialchars($cliente['nome']) ?></p>
                        <p><?= htmlspecialchars($cliente['email']) ?></p>
                    </div>
                    <div class="flex gap-4">
                        <a href="<?php echo '?'.$id_cliente.'=true' ?>" class="w-20 h-10 flex items-center justify-center rounded text-white bg-black">Editar</a>
                        <form action="/includes/cliente/removerCliente.php" method="POST">
                            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
                            <button type="submit" class="w-20 h-10 rounded text-white bg-red-600">Excluir</button>
                        </form>
                    </div>
                </div>
                <?php if ($showModal): ?>
                <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                    <div class="bg-white p-8 rounded shadow-lg max-w-sm w-full">
                        <h2 class="text-xl font-bold mb-4"><?= htmlspecialchars("Editar " . $cliente['nome']) ?></h2>
                        <?php include __DIR__ . '/editarCliente.php' ?>
                        <br>
                        <a href="./" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Fechar</a>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum Cliente encontrado!</p>
    <?php endif; ?>
</div>