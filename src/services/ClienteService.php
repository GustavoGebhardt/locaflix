<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class ClienteService extends Conection
{
    public function createCliente($nome, $email)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO cliente(id_cliente, nome, email) VALUES ('$uuid4', '$nome', '$email');";
        $cliente = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $cliente;
    }

    public function getClientes()
    {
        $clientes = $this->pdo
            ->query('SELECT * FROM cliente;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $clientes;
    }

    public function getCliente($id)
    {
        $query = "SELECT * FROM cliente WHERE id_cliente = '$id';";
        $cliente = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $cliente;
    }

    public function updateCliente($id, $nome, $email)
    {
        $query = "UPDATE cliente SET nome = '$nome', email = '$email' WHERE id_cliente = '$id';";
        $cliente = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $cliente;
    }

    public function removeCliente($id)
    {
        $query = "DELETE FROM cliente WHERE id_cliente = '$id';";
        $cliente = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $cliente;
    }
}
