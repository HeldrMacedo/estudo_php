<?php
class Cesta
{
    private $hora;
    private $itens;

    public function __construct()
    {
        $this->hora = date('Y-m-d H:i:s');
        $this->itens = [];
    }
    //AQUI ACONTECE A AGREGAÇÃO
    public function addItem(Produto $produto)
    {
        $this->itens[] = $produto;
    }

    public function getItens()
    {
        return $this->itens;
    }
}