<?php

class ProdutoGateway
{
    private static $conn;
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }
    public function find($id, $class = 'stdClass')
    {
        $select = "SELECT * FROM produto WHERE id = '$id'";
        print "$select <br>";
        $result = self::$conn->query($select);
        return $result->fetchObject($class);
    }

    public function all($filter = '', $class = 'stdClass')
    {
        $sql = "SELECT * FROM produto";
        print "$sql <br>";

        if ($filter)
        {
            $sql.= " WHERE $filter";
        }
        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function save($data)
    {
        if (empty($data->id)) {
            $id = $this->getLastId() +1;
            $sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, ".
                "      preco_venda, codigo_barras, data_cadastro, origem)" .
                " VALUES ('{$id}', " .
                "'{$data->descricao}', " .
                "'{$data->estoque}', " .
                "'{$data->preco_custo}', " .
                "'{$data->preco_venda}', " .
                "'{$data->codigo_barras}', " .
                "'{$data->data_cadastro}', " .
                "'{$data->origem}')";
        }
        else {
            $sql = "UPDATE produto SET descricao     = '{$data->descricao}', " .
                "       estoque       = '{$data->estoque}', " .
                "       preco_custo   = '{$data->preco_custo}', " .
                "       preco_venda   = '{$data->preco_venda}', ".
                "       codigo_barras = '{$data->codigo_barras}', ".
                "       data_cadastro = '{$data->data_cadastro}', ".
                "       origem        = '{$data->origem}' ".
                "WHERE  id            = '{$data->id}'";
        }
        print "$sql <br>";
        return self::$conn->exec($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM produto WHERE id = '$id'";
        print "$sql <br>";
        return self::$conn->query($sql);
    }

    public function getLastId()
    {
        $sql = "SELECT max(id) as max FROM produto";
        $result = self::$conn->query($sql);
        $data = $result->fetchObject();
        return $data->max;
    }
}
