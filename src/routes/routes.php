<?php

use src\controllers\HomeController;

$app->get('/', [HomeController::class, 'index']);
