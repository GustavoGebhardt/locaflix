<?php

namespace src\services;

use src\database\Conection;
use Ramsey\Uuid\Uuid;

class EmprestimoService extends Conection
{
    public function createEmprestimo($id_cliente, $id_status, $id_filme, $data_emprestimo, $data_devolucao)
    {
        $uuid4 = Uuid::uuid4();
        $query = "INSERT INTO emprestimo(id_emprestimo, id_cliente, id_status, id_filme, data_emprestimo, data_devolucao) VALUES ('$uuid4', '$id_cliente', '$id_status', '$id_filme', '$data_emprestimo', '$data_devolucao');";
        $emprestimo = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $emprestimo;
    }

    public function getEmprestimos()
    {
        $emprestimos = $this->pdo
            ->query('SELECT * FROM emprestimo;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $emprestimos;
    }

    public function getEmprestimo($id)
    {
        $query = "SELECT * FROM emprestimo WHERE id_emprestimo = '$id';";
        $emprestimo = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $emprestimo;
    }

    public function updateEmprestimo($id, $id_cliente, $id_status, $id_filme, $data_emprestimo, $data_devolucao)
    {
        $query = "UPDATE emprestimo SET id_cliente = '$id_cliente', id_status = '$id_status', id_filme = '$id_filme', data_emprestimo = '$data_emprestimo', data_devolucao = '$data_devolucao' WHERE id_emprestimo = '$id';";
        $emprestimo = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $emprestimo;
    }

    public function removeEmprestimo($id)
    {
        $query = "DELETE FROM emprestimo WHERE id_emprestimo = '$id';";
        $emprestimo = $this->pdo
            ->query($query)
            ->fetchAll(\PDO::FETCH_ASSOC);
        return $emprestimo;
    }
}
