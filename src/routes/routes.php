<?php

use src\controllers\DiretorController;
use src\controllers\FilmeController;
use src\controllers\HomeController;

$app->get('/', [HomeController::class, 'index']);
$app->get('/filme', [FilmeController::class, 'index']);
$app->get('/diretor', [DiretorController::class, 'index']);