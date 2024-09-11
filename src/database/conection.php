<?php

//Conexão banco de dados
namespace src\database;

abstract class Conection
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $port = '5432';
        $dbname = 'meuBanco';
        $user = 'postgres';
        $password = 'Mudar@123!';

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        //Inicio da comunicação PDO
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }
}