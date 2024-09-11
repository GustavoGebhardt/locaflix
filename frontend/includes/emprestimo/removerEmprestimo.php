<?php
include_once __DIR__ . '/../../services/metodos.php';

if (isset($_POST['id_emprestimo'])) {
    $id_emprestimo = $_POST['id_emprestimo'];
    delete("http://localhost:8000/emprestimo/$id_emprestimo");
    header("Location: /../../pages/emprestimo/");
    exit();
}