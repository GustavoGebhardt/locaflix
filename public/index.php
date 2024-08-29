<?php

use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

// Criar um contêiner DI
$container = new Container();

// Configurar as configurações no contêiner
$settings = require __DIR__ . '/../config/settings.php';
$container->set('settings', $settings);

// Passar o contêiner para o AppFactory
AppFactory::setContainer($container);

// Criar a aplicação Slim
$app = AppFactory::create();

// Carregar Middleware
require __DIR__ . '/../src/middleware/middleware.php';

// Carregar Rotas
require __DIR__ . '/../src/routes/routes.php';

$app->run();
