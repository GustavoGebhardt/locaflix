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

        // {
        //     "id_diretor": "67316d24-c855-4929-a6de-593a6698ef83",
        //     "id_faixa_etaria": "560a8a63-b9f7-483b-b0cb-888974886370",
        //     "id_capa": "22684519-9bb5-406c-bd65-6939207a7e0f",
        //     "nome": "aloMundo teste",
        //     "lancamento": "2023-07-20"
        // }

        $data = json_decode($request->getBody(), true);

        $id_diretor = $data['id_diretor'];
        //67316d24-c855-4929-a6de-593a6698ef83
        $id_faixa_etaria = $data['id_faixa_etaria'];
        //560a8a63-b9f7-483b-b0cb-888974886370
        $id_capa = $data['id_capa'];
        //22684519-9bb5-406c-bd65-6939207a7e0f
        $nome = $data['nome'];
        //aloMundo teste
        $lancamento = $data['lancamento'];
        //2023-07-20

        $filme = $this->createFilme($id_diretor, $id_faixa_etaria, $id_capa, $nome, $lancamento);
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
        $id_capa = $data['id_capa'];
        $nome = $data['nome'];
        $lancamento = $data['lancamento'];

        $filme = $this->updateFilme($id, $id_diretor, $id_faixa_etaria, $id_capa, $nome, $lancamento);
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
