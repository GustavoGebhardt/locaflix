<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class FaixaEtariaService extends Conection
{
    public function createFaixaEtaria($idade)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO faixa_etaria(id_faixa_etaria, idade) VALUES ('$uuid4', '$idade');";
        $faixa_etaria = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $faixa_etaria;
    }

    public function getFaixaEtarias()
    {
        $faixa_etarias = $this->pdo
            ->query('SELECT * FROM faixa_etaria;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $faixa_etarias;
    }

    public function getFaixaEtaria($id)
    {
        $query = "SELECT * FROM faixa_etaria WHERE id_faixa_etaria = '$id';";
        $faixa_etaria = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $faixa_etaria;
    }

    public function updateFaixaEtaria($id, $idade)
    {
        $query = "UPDATE faixa_etaria SET idade = '$idade' WHERE id_faixa_etaria = '$id';";
        $faixa_etaria = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $faixa_etaria;
    }

    public function removeFaixaEtaria($id)
    {
        $query = "DELETE FROM faixa_etaria WHERE id_faixa_etaria = '$id';";
        $faixa_etaria = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $faixa_etaria;
    }
}
