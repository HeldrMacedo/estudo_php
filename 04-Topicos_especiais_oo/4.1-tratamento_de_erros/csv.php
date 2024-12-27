<?php
require_once 'CSVParse.php';

$csv = new CSVParse('clientes.csv', ';');
try {
    $csv->parse();

    echo '<pre>';
    print_r($csv->fetch());
    echo '</pre>';
}catch (Exception $e){
    echo $e->getMessage();
}
