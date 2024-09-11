<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon"/>
    <title>Cliente</title>
</head>
<body>
    <?php include __DIR__ . './../../includes/header.php' ?>
    <?php include __DIR__ . './../../includes/cliente/listarCliente.php' ?>
    <div class="flex flex-col items-center mb-10">
        <?php include __DIR__ . './../../includes/cliente/cadastrarCliente.php' ?>
    </div>
</body>
</html>