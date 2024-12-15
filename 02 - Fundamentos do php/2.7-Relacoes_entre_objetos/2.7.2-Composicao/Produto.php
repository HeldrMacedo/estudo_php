<?php
class Produto
{
    private $decricao;
    private $estoque;
    private $preco;
    private $fabricante;
    private $caracteristicas;

    public function __construct($decricao, $estoque, $preco)
    {
        $this->decricao = $decricao;
        $this->estoque = $estoque;
        $this->preco = $preco;
        $this->caracteristicas = [];
    }
    //AQUI ACONTECE A COMPOSIÇÃO
    public function addCaracteristica( $nome, $valor)
    {
        $this->caracteristicas[] = new Caracteristica($nome, $valor);
    }

    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    public function getDescricao()
    {
        return $this->decricao;
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