<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\DiretorService;

class DiretorController extends DiretorService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $nome = $data['nome'];

        $filme = $this->createDiretor($nome);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $filmes = $this->getDiretores();
        $response->getBody()->write(json_encode($filmes));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->getDiretor($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $nome = $data['nome'];

        $filme = $this->updateDiretor($id, $nome);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->removeDiretor($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
