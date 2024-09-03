<?php

namespace src\controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\services\GeneroService;

class GeneroController extends GeneroService
{
    public function create(Request $request, Response $response, array $args)
    {
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $tipo = $data['tipo'];

        $genero = $this->createGenero($tipo);
        $response->getBody()->write(json_encode($genero));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findAll(Request $request, Response $response, array $args)
    {
        $generos = $this->getGeneros();
        $response->getBody()->write(json_encode($generos));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function findOne(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $genero = $this->getGenero($id);
        $response->getBody()->write(json_encode($genero));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function update(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = $request->getBody();
        $data = json_decode($request->getBody(), true);

        $tipo = $data['tipo'];

        $genero = $this->updateGenero($id, $tipo);
        $response->getBody()->write(json_encode($genero));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function remove(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $genero = $this->removeGenero($id);
        $response->getBody()->write(json_encode($genero));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
