<?php
require_once 'Produto.php';
require_once 'Caracteristica.php';

$p1 = new Produto('Chocolate', 50, 7);
$p1->addCaracteristica('Cor', 'Branco');
$p1->addCaracteristica('Peso', '500gr');

print 'Produto: '. $p1->getDescricao().'<br>';
foreach($p1->getCaracteristicas() as $caracteristica){
    $nome = $caracteristica->getNome();
    $valor = $caracteristica->getValor();
    print "Caracristicas : {$nome} - {$valor} <br>";
}

echo '<pre>';
print_r($p1);
echo '</pre>';
