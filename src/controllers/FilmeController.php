<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\FilmeService;

class FilmeController extends FilmeService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $id_diretor = $data['id_diretor'];
        $id_faixa_etaria = $data['id_faixa_etaria'];
        $nome = $data['nome'];
        $lancamento = $data['lancamento'];

        $filme = $this->createFilme($id_diretor, $id_faixa_etaria, $nome, $lancamento);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $filmes = $this->getFilmes();
        $response->getBody()->write(json_encode($filmes));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->getFilme($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $id_diretor = $data['id_diretor'];
        $id_faixa_etaria = $data['id_faixa_etaria'];
        $nome = $data['nome'];
        $lancamento = $data['lancamento'];

        $filme = $this->updateFilme($id, $id_diretor, $id_faixa_etaria, $nome, $lancamento);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $filme = $this->removeFilme($id);
        $response->getBody()->write(json_encode($filme));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
