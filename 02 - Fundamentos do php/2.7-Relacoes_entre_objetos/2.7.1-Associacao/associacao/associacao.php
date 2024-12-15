<?php
require_once 'fabricante.php';
require_once  'Produto.php';
/*Associação em PHP refere-se à relação entre duas ou mais classes. Essas classes podem interagir entre si para realizar operações específicas.
Associação é a relação mais comum entre objetos. Na associação um objeto contém uma referência a outro objeto. Essa referência funciona como um apontamento
em que um objeto terá um atributo que apontará para a posição da mamória onde o outro objeto se encontra, podendo executar seus métodos. a forma mais comum
de implementar uma associação é ter um objeto como atributo de outro.

*/
$p1 = new Produto('Chocolate', 10, 7);
$f1 = new Fabricante('Fabrica', 'Rua tal..', '098.090.009.00');

//Momento que a associação acontece
$p1->setFabricante($f1);

print "O Fabricante do produto {$p1->getDescricao()} é {$p1->getFabricante()->getNome()}";

echo '<pre>';
var_dump($p1);
var_dump($f1);
echo '</pre>';
