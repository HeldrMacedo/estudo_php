<?php
require_once 'Conta.php';
require_once 'ContaCorrente.php';
require_once 'ContaPoupanca.php';

$conta_poupanca = new ContaPoupanca('100', '123123', '500');
echo 'saldo: '.$conta_poupanca->getSaldo(). '<br/>';
$conta_poupanca->depositar(200);
echo 'saldo: '.$conta_poupanca->getSaldo(). '<br/>';
$conta_poupanca->retirar(100);
echo 'saldo: '.$conta_poupanca->getSaldo(). '<br/>';