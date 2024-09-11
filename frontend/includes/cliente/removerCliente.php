<?php
include_once __DIR__ . '/../../services/metodos.php';

if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];
    delete("http://localhost:8000/cliente/$id_cliente");
    header("Location: /../../pages/cliente/");
    exit();
}