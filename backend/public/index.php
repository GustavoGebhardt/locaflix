<?php
//arquivo inicial da aplicaçao

//importação da biblioteca Slim
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php'; 

$app = AppFactory::create();

require __DIR__ . '/../src/routes/routes.php';

$app->run();
