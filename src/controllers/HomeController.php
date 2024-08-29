<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response, array $args)
    {
        $response->getBody()->write("Hello, Slim Framework!");
        return $response;
    }
}
