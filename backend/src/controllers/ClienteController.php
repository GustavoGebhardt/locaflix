<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\ClienteService;

class ClienteController extends ClienteService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $nome = $data['nome'];
        $email = $data['email'];

        $cliente = $this->createCliente($nome, $email);
        $response->getBody()->write(json_encode($cliente));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $clientes = $this->getClientes();
        $response->getBody()->write(json_encode($clientes));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $cliente = $this->getCliente($id);
        $response->getBody()->write(json_encode($cliente));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $nome = $data['nome'];
        $email = $data['email'];

        $cliente = $this->updateCliente($id, $nome, $email);
        $response->getBody()->write(json_encode($cliente));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $cliente = $this->removeCliente($id);
        $response->getBody()->write(json_encode($cliente));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
