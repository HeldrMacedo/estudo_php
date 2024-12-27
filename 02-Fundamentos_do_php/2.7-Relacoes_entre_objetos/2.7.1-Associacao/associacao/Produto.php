<?php
class Produto
{
    private $descricao;
    private $preco;
    private $estoque;
    private $fabricante;

    public function __construct($descricao, $preco, $estoque)
    {
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->estoque = $estoque;

    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setFabricante(Fabricante $fabricante)
    {
        $this->fabricante = $fabricante;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }
}