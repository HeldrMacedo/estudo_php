<?php
declare(strict_types=1);
//Operador NullSafe Operation é usado para verificar se o valor retornado é null
//com isso evita que o código quebre
class Estado
{
    private string $nome;

    public function __construct( string $nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}

class Cidade
{
    private string $nome;
    private Estado $estado;

    public function __construct(string $nome, Estado $estado)
    {
        $this->nome = $nome;
        $this->estado = $estado;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEstado()
    {
        return $this->estado;
    }

}

$e1 = new Estado('Rio Grande do Norte');
$c1 = new Cidade('Natal', $e1);

$c1->getEstado()?->getNome();

