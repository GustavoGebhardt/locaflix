<?php

use src\controllers\CapaController;
use src\controllers\ClienteController;
use src\controllers\DiretorController;
use src\controllers\EmprestimoController;
use src\controllers\FaixaEtariaController;
use src\controllers\FilmeController;
use src\controllers\StatusController;

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

$app->post('/faixaEtaria', [FaixaEtariaController::class, 'create']);
$app->get('/faixaEtaria', [FaixaEtariaController::class, 'findAll']);
$app->get('/faixaEtaria/{id}', [FaixaEtariaController::class, 'findOne']);
$app->put('/faixaEtaria/{id}', [FaixaEtariaController::class, 'update']);
$app->delete('/faixaEtaria/{id}', [FaixaEtariaController::class, 'remove']);

$app->post('/capa', [CapaController::class, 'create']);
$app->get('/capa', [CapaController::class, 'findAll']);
$app->get('/capa/{id}', [CapaController::class, 'findOne']);
$app->put('/capa/{id}', [CapaController::class, 'update']);
$app->delete('/capa/{id}', [CapaController::class, 'remove']);

$app->post('/status', [StatusController::class, 'create']);
$app->get('/status', [StatusController::class, 'findAll']);
$app->get('/status/{id}', [StatusController::class, 'findOne']);
$app->put('/status/{id}', [StatusController::class, 'update']);
$app->delete('/status/{id}', [StatusController::class, 'remove']);