<?php
include_once __DIR__ . '/../../services/metodos.php';

if (isset($_POST['id_diretor'])) {
    $id_diretor = $_POST['id_diretor'];
    delete("http://localhost:8000/diretor/$id_diretor");
    header("Location: /../../pages/diretor/");
    exit();
}