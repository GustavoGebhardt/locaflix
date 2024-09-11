<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class CapaService extends Conection
{
    public function createCapa($caminho)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO capa(id_capa, caminho) VALUES ('$uuid4', '$caminho');";
        $capa = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $uuid4;
    }

    public function getCapas()
    {
        $capas = $this->pdo
            ->query('SELECT * FROM capa;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $capas;
    }

    public function getCapa($id)
    {
        $query = "SELECT * FROM capa WHERE id_capa = '$id';";
        $capa = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $capa;
    }

    public function updateCapa($id, $caminho)
    {
        $query = "UPDATE capa SET caminho = '$caminho' WHERE id_capa = '$id';";
        $capa = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $capa;
    }

    public function removeCapa($id)
    {
        $query = "DELETE FROM capa WHERE id_capa = '$id';";
        $capa = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $capa;
    }
}
