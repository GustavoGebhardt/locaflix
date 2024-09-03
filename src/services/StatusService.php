<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class StatusService extends Conection
{
    public function createStatus($status)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO status(id_status, tipo) VALUES ('$uuid4', '$status');";
        $status = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $status;
    }

    public function getAllStatus()
    {
        $statuss = $this->pdo
            ->query('SELECT * FROM status;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $statuss;
    }

    public function getStatus($id)
    {
        $query = "SELECT * FROM status WHERE id_status = '$id';";
        $status = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $status;
    }

    public function updateStatus($id, $tipo)
    {
        $query = "UPDATE status SET tipo = '$tipo' WHERE id_status = '$id';";
        $status = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $status;
    }

    public function removeStatus($id)
    {
        $query = "DELETE FROM status WHERE id_status = '$id';";
        $status = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $status;
    }
}
