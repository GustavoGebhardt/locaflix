<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class DiretorController
{
    public function index(Request $request, Response $response, array $args)
    {
        $response->getBody()->write("Diretor");
        return $response;
    }

    public function create(Request $request, Response $response, array $args)
    {

    }

    public function findAll(Request $request, Response $response, array $args)
    {
        
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        
    }

    public function update(Request $request, Response $response, array $args)
    {
        
    }

    public function remove(Request $request, Response $response, array $args)
    {
        
    }
}
