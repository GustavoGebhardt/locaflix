<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class FilmeService extends Conection
{
    public function createFilme($id_diretor, $id_faixa_etaria, $id_capa, $nome, $lancamento)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO filme(id_filme, id_diretor, id_faixa_etaria, id_capa, nome, lancamento) VALUES ('$uuid4', '$id_diretor', '$id_faixa_etaria', '$id_capa', '$nome', '$lancamento');";
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }

    public function getFilmes()
    {
        $filmes = $this->pdo
            ->query('SELECT * FROM filme;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filmes;
    }

    public function getFilme($id)
    {
        $query = "SELECT * FROM filme WHERE id_filme = '$id';";
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }

    public function updateFilme($id, $id_diretor, $id_faixa_etaria, $id_capa, $nome, $lancamento)
    {
        $query = "UPDATE filme SET id_diretor = '$id_diretor', id_faixa_etaria = '$id_faixa_etaria', id_capa = '$id_capa', nome = '$nome', lancamento = '$lancamento' WHERE id_filme = '$id';";
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }

    public function removeFilme($id)
    {
        $query = "DELETE FROM filme WHERE id_filme = '$id';";
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }
}
