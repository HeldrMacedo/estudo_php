<?php
/*
 * Membros de classes são constantes, métodos e atributos static que podemos usar como é mostrado nessa classe
 */
Class Pessoa
{
    private $nome;
    private $genero;
    private static $contador;
    const GENEROS = ['M' => 'Masculino', 'F' => 'Feminino'];

    public function __construct($nome, $genero)
    {
        $this->nome = $nome;
        $this->genero = $genero;
        self::$contador++;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getGenero(){
        return self::GENEROS[$this->genero];
    }

    public static function getContador(){
        return self::$contador;
    }
}

$p1 = new Pessoa('Helder', 'M');
$p2 = new Pessoa('Lorrainy', 'F');

echo '<pre>';
print $p1->getNome();
echo '<br/>';
print $p1->getGenero();
echo '</pre>';