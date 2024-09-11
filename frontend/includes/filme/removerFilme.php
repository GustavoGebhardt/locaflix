<?php
include_once __DIR__ . '/../../services/metodos.php';

if (isset($_POST['id_filme'])) {
    $id_filme = $_POST['id_filme'];
    delete("http://localhost:8000/filme/$id_filme");
    header("Location: /../../pages/filme/");
    exit();
}