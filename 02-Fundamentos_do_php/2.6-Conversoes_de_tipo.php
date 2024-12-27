<?php
$produto = new stdClass;
$produto->descricao = 'Chocolate';
$produto->estoque = 100;
$produto->preco = 7;

//Converter o objeto para array
$vetor = (array) $produto;

$vetor2 = ['descricao' => 'Café', 'estoque' => 100, 'preco' => 7];

//Converter o array em objeto
$produto2 = (object) $vetor2;