<?php
class Produto
{
    private $descricao;
    private $estoque;
    private $preco;

    public function __construct($descricao, $estoque, $preco)
    {
        $this->setDescricao($descricao);
        $this->setEstoque($estoque);
        $this->setPreco($preco);
    }

    #Esse método é chamado no momento que o objeto é deslocado da mémoria
    public function __destruct()
    {
        //Faz alguma ação
        echo "Destruído: Objeto {$this->getDescricao()}<br>}";
    }

    public function setDescricao($descricao)
    {
        if (is_string($descricao)) {
            $this->descricao = $descricao;
        }
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setEstoque($estoque)
    {

        if (is_numeric($estoque) && $estoque > 0) {
            $this->estoque = $estoque;
        }

    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setPreco($preco)
    {
        if (is_numeric($preco)) {
            $this->preco = $preco;
        }
    }

    public function aumentarEstoque($unidades)
    {
        if (is_numeric($unidades) && $unidades >= 0) {
            $this->estoque += $unidades;
        }
    }

    public function diminuitEstoque($unidades)
    {
        if (is_numeric($unidades) && $unidades >= 0) {
            $this->estoque -= $unidades;
        }
    }

    public function reajustarPreco($percentual)
    {
        if (is_numeric($percentual) && $percentual >= 0) {
            $this->preco *= (1 + ($percentual/100));
        }
    }
}

$p1 = new Produto('Chocolate', 10, 8);
$p1->aumentarEstoque(10);
$p1->diminuitEstoque(5);
$p1->reajustarPreco(50);

echo "O estoque de {$p1->getDescricao()} é {$p1->getEstoque()}";