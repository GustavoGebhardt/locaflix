<?php

use src\controllers\DiretorController;
use src\controllers\FilmeController;
use src\controllers\HomeController;

$app->get('/', [HomeController::class, 'index']);

$app->post('/filme', [FilmeController::class, 'create']);
$app->get('/filme', [FilmeController::class, 'findAll']);
$app->get('/filme/{id}', [FilmeController::class, 'findOne']);
$app->put('/filme/{id}', [FilmeController::class, 'update']);
$app->delete('/filme/{id}', [FilmeController::class, 'remove']);

$app->get('/diretor', [DiretorController::class, 'index']);