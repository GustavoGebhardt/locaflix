<?php

function validateText($par) {
    if(!is_string($par)) {
        echo "<p>Entrada de dados incorreta! Valor não é string.</p>";
        die;
    }
}

function validateData($par) {
    validateText($par);

    //validar formato (xxxx-yy-zz)
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $par)) {
        echo "<p>Entrada de dados incorreta! Formato de data invalido.</p>";
        die;
    }
}

function validateWithDate($par) {
    validateData($par);

    $hoje = date("Y-m-d");

    if ($par < $hoje) {
        echo "<p>Entrada de dados incorreta! Data invalida.</p>";
        die;
    }
}