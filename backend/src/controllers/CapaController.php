<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\CapaService;

class CapaController extends CapaService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $caminho = $data['caminho'];

        $capa = $this->createCapa($caminho);
        $response->getBody()->write(json_encode($capa));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $capas = $this->getCapas();
        $response->getBody()->write(json_encode($capas));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $capa = $this->getCapa($id);
        $response->getBody()->write(json_encode($capa));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $caminho = $data['caminho'];

        $capa = $this->updateCapa($id, $caminho);
        $response->getBody()->write(json_encode($capa));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $capa = $this->removeCapa($id);
        $response->getBody()->write(json_encode($capa));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
