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

        $diretor = $this->createDiretor($nome);
        $response->getBody()->write(json_encode($diretor));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $diretors = $this->getDiretores();
        $response->getBody()->write(json_encode($diretors));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $diretor = $this->getDiretor($id);
        $response->getBody()->write(json_encode($diretor));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $nome = $data['nome'];

        $diretor = $this->updateDiretor($id, $nome);
        $response->getBody()->write(json_encode($diretor));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $diretor = $this->removeDiretor($id);
        $response->getBody()->write(json_encode($diretor));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
