<?php

class Orcamento
{
    private $itens;

    public function adiciona(OrcavelInterface $item, $quantidade){
        $this->itens[] = [$quantidade, $item];
    }

    public function calculaTotal(){
        $total = 0;

        foreach ($this->itens as $item) {
            $total += $item[0] * $item[1]->getPreco();
        }

        return $total;
    }
}