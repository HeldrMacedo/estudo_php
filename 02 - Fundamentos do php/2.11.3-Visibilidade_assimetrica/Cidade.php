<?php
/*
A partir do PHP 8.4, as propriedades também podem ter sua visibilidade definida de forma assimétrica,
com escopo diferente para leitura (get) e escrita (set). Especificamente, a visibilidade set pode ser
especificada separadamente, desde que não seja mais permissiva que a visibilidade padrão.
*/

class Cidade
{
    public function __construct(public private(set) string $nome){}

}

class Pessoa
{
    public private(set) string $nome;
    public private(set) Cidade $cidade;

    public function __construct(string $nome, Cidade $cidade)
    {
        $this->nome = $nome;
        $this->cidade = $cidade;
    }
}

$c1 = new Cidade('Natal');
$p1 = new Pessoa('Helder', $c1);
print $p1->nome;
print $p1->cidade->nome;
print $c1->nome;
$c1->nome = 'Cerá-Mirim';