<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class FilmeService extends Conection
{
    public function createFilme($id_diretor, $id_faixa_etaria, $nome, $lancamento)
    {
        $uuid4 = Uuid::uuid4();
        $query = sprintf("INSERT INTO filme(id_filme, id_diretor, id_faixa_etaria, nome, lancamento) VALUES ('%s', '%s', '%s', '%s', '%s');", $uuid4, $id_diretor, $id_faixa_etaria, $nome, $lancamento);
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
        $query = sprintf("SELECT * FROM filme WHERE id_filme = '%s';", $id);
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }

    public function updateFilme($id, $id_diretor, $id_faixa_etaria, $nome, $lancamento)
    {
        $query = sprintf("UPDATE filme SET id_diretor = '$id_diretor', id_faixa_etaria = '$id_faixa_etaria', nome = '$nome', lancamento = '$lancamento' WHERE id_filme = '$id';");
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }

    public function removeFilme($id)
    {
        $query = sprintf("DELETE FROM filme WHERE id_filme = '%s';", $id);
        $filme = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $filme;
    }
}
