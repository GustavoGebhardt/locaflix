<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\FaixaEtariaService;

class FaixaEtariaController extends FaixaEtariaService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $idade = $data['idade'];

        $filme = $this->createFaixaEtaria($idade);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $filmes = $this->getFaixaEtarias();
        $response->getBody()->write(json_encode($filmes));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->getFaixaEtaria($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $idade = $data['idade'];

        $filme = $this->updateFaixaEtaria($id, $idade);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->removeFaixaEtaria($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
