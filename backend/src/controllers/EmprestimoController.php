<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\EmprestimoService;

class EmprestimoController extends EmprestimoService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $id_cliente = $data['id_cliente'];
        $id_status = $data['id_status'];
        $id_filme = $data['id_filme'];
        $data_emprestimo = $data['data_emprestimo'];
        $data_devolucao = $data['data_devolucao'];

        $emprestimo = $this->createEmprestimo($id_cliente, $id_status, $id_filme, $data_emprestimo, $data_devolucao);
        $response->getBody()->write(json_encode($emprestimo));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $emprestimos = $this->getEmprestimos();
        $response->getBody()->write(json_encode($emprestimos));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $emprestimo = $this->getEmprestimo($id);
        $response->getBody()->write(json_encode($emprestimo));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $id_cliente = $data['id_cliente'];
        $id_status = $data['id_status'];
        $id_filme = $data['id_filme'];
        $data_emprestimo = $data['data_emprestimo'];
        $data_devolucao = $data['data_devolucao'];

        $emprestimo = $this->updateEmprestimo($id, $id_cliente, $id_status, $id_filme, $data_emprestimo, $data_devolucao);
        $response->getBody()->write(json_encode($emprestimo));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $emprestimo = $this->removeEmprestimo($id);
        $response->getBody()->write(json_encode($emprestimo));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
