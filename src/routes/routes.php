<?php

use src\controllers\ClienteController;
use src\controllers\DiretorController;
use src\controllers\EmprestimoController;
use src\controllers\FilmeController;

$app->post('/filme', [FilmeController::class, 'create']);
$app->get('/filme', [FilmeController::class, 'findAll']);
$app->get('/filme/{id}', [FilmeController::class, 'findOne']);
$app->put('/filme/{id}', [FilmeController::class, 'update']);
$app->delete('/filme/{id}', [FilmeController::class, 'remove']);

$app->post('/diretor', [DiretorController::class, 'create']);
$app->get('/diretor', [DiretorController::class, 'findAll']);
$app->get('/diretor/{id}', [DiretorController::class, 'findOne']);
$app->put('/diretor/{id}', [DiretorController::class, 'update']);
$app->delete('/diretor/{id}', [DiretorController::class, 'remove']);

$app->post('/emprestimo', [EmprestimoController::class, 'create']);
$app->get('/emprestimo', [EmprestimoController::class, 'findAll']);
$app->get('/emprestimo/{id}', [EmprestimoController::class, 'findOne']);
$app->put('/emprestimo/{id}', [EmprestimoController::class, 'update']);
$app->delete('/emprestimo/{id}', [EmprestimoController::class, 'remove']);

$app->post('/cliente', [ClienteController::class, 'create']);
$app->get('/cliente', [ClienteController::class, 'findAll']);
$app->get('/cliente/{id}', [ClienteController::class, 'findOne']);
$app->put('/cliente/{id}', [ClienteController::class, 'update']);
$app->delete('/cliente/{id}', [ClienteController::class, 'remove']);