<?php
require_once 'OrcavelInterface.php';
require_once 'Orcamento.php';
require_once 'Produto.php';
require_once 'Servico.php';

$o = new Orcamento();
$o->adiciona(new Produto('Máquina de Café', 10, 299), 1);
$o->adiciona(new Produto('Barbeador', 10, 170), 1);
$o->adiciona(new Produto('Barra de Chocolate', 10, 7), 3);

$o->adiciona(new Servico('Corte de Grama', 20), 1);
$o->adiciona(new Servico('Corte de Pesca', 20), 1);
$o->adiciona(new Servico('Limpeza do apto', 50), 1);

print $o->calculaTotal();
