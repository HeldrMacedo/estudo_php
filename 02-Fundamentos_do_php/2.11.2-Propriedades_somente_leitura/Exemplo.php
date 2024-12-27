<?php
/*
Em PHP, o readonly é uma palavra-chave usada para definir propriedades de uma classe que só
podem ser lidas, mas não modificadas, após a inicialização. Isso é útil quando você
deseja garantir que certos valores permaneçam constantes após serem definidos.
*/

class Exemplo {
    public readonly string $nome;
    public function __construct(string $nome) {
        $this->nome = $nome;
    }
}
$objeto = new Exemplo("Copilot");
echo $objeto->nome; // Saída: Copilot
// Tentar modificar a propriedade readonly resultará em um erro
// $objeto->nome = "Outro Nome";
/// Erro: Cannot modify readonly property Exemplo::$nome

