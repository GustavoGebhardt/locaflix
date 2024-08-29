<?php

// Exemplo de middleware
$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response->withHeader('X-Powered-By', 'Slim');
});
