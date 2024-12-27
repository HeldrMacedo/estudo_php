<?php
$ingredientes = new SplQueue();
//adiciona na fila
$ingredientes->enqueue('Peixe');
$ingredientes->enqueue('Sal');
$ingredientes->enqueue('Limão');

foreach ($ingredientes as $item)
{
    print 'Item: ' . $item . '<br>';
}

echo '<br>';
//conta a fila
print $ingredientes->count();
echo '<br>';
//remove da fila
print $ingredientes->dequeue();
echo '<br>';

print $ingredientes->count();
echo '<br>';
print $ingredientes->dequeue();
echo '<br>';

print $ingredientes->count();
echo '<br>';
print $ingredientes->dequeue();
echo '<br>';
