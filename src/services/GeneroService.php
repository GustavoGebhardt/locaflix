<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class GeneroService extends Conection
{
    public function createGenero($tipo)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO genero(id_genero, tipo) VALUES ('$uuid4', '$tipo');";
        $genero = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $genero;
    }

    public function getGeneros()
    {
        $generos = $this->pdo
            ->query('SELECT * FROM genero;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $generos;
    }

    public function getGenero($id)
    {
        $query = "SELECT * FROM genero WHERE id_genero = '$id';";
        $genero = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $genero;
    }

    public function updateGenero($id, $tipo)
    {
        $query = "UPDATE genero SET tipo = '$tipo' WHERE id_genero = '$id';";
        $genero = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $genero;
    }

    public function removeGenero($id)
    {
        $query = "DELETE FROM genero WHERE id_genero = '$id';";
        $genero = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $genero;
    }
}
