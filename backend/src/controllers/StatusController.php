<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\StatusService;

class StatusController extends StatusService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $tipo = $data['tipo'];

        $filme = $this->createStatus($tipo);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $filmes = $this->getAllStatus();
        $response->getBody()->write(json_encode($filmes));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->getStatus($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $tipo = $data['tipo'];

        $filme = $this->updateStatus($id, $tipo);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->removeStatus($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
