<?php
$dados = ['salmão', 'tilápia', 'sardinha', 'badejo', 'pescada', 'dourado', 'corvina', 'cavala', 'bagre'];

$objarray = new ArrayObject( $dados );

$objarray->append('bacalhau');
//retorna o valor da posição
print $objarray->offsetGet(2) . '<br>';
//altera a posição
$objarray->offsetSet(2, 'linguado');
print $objarray->count() . '<br>';
//elemina o elemento na posição e elemina a posição também
$objarray->offsetUnset(4);
//testa se uma posição existe
if ($objarray->offsetExists(10))
{
    print 'Posição 10 encontrada <br>';
}
else
{
    print 'Posição 10 não encontrada <br>';
}

$objarray[] = 'atum';
//ordena o array
$objarray->natsort();

foreach ($objarray as $item)
{
    print 'Item: ' . $item . '<br>';
}
//forma serialize
print $objarray->serialize();
