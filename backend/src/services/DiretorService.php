<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class DiretorService extends Conection
{
    public function createDiretor($nome)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO diretor(id_diretor, nome) VALUES ('$uuid4', '$nome');";
        $diretor = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $diretor;
    }

    public function getDiretores()
    {
        $diretors = $this->pdo
            ->query('SELECT * FROM diretor;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $diretors;
    }

    public function getDiretor($id)
    {
        $query = "SELECT * FROM diretor WHERE id_diretor = '$id';";
        $diretor = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $diretor;
    }

    public function updateDiretor($id, $nome)
    {
        $query = "UPDATE diretor SET nome = '$nome' WHERE id_Diretor = '$id';";
        $diretor = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $diretor;
    }

    public function removeDiretor($id)
    {
        $query = "DELETE FROM diretor WHERE id_Diretor = '$id';";
        $diretor = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $diretor;
    }
}
