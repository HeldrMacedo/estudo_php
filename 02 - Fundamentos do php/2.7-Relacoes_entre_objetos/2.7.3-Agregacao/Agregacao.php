<?php
require_once 'Produto.php';
require_once 'Cesta.php';

$c1 = new Cesta();

$p1 = new Produto('Chocolate', 10, 5);
$p2 = new Produto('Mushroom', 10, 6);
$p3 = new Produto('Milk', 20, 6);

$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);

echo '<pre>';
print_r($c1);
echo '</pre>';
