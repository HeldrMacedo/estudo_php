<?php
require_once 'Conta.php';
require_once 'ContaCorrente.php';
require_once 'ContaPoupanca.php';

$conta_poupanca = new ContaPoupanca('100', 'PP.3333', 500);
/*echo 'saldo: '.$conta_poupanca->getSaldo(). '<br/>';
$conta_poupanca->depositar(200);
echo 'saldo: '.$conta_poupanca->getSaldo(). '<br/>';
$conta_poupanca->retirar(100);
echo 'saldo: '.$conta_poupanca->getSaldo(). '<br/>';
*/
$conta_corrente = new ContaCorrente('100', 'CC.1234', 100, 500);
$contas = [];
$contas[] = $conta_poupanca;
$contas[] = $conta_corrente;

foreach ($contas as $conta){
    if ($conta instanceof Conta){
        print $conta->getInfo().'<br/>';
        $conta->depositar(200);
        print "Deposito de 200 <br/>";
        print "--Saldo Atual-- {$conta->getSaldo()} <br/>";
        if ($conta->retirar(700)) {
            print "Retirar 700 (OK)<br/>";
        }else{
            print "Retirada de 700 negada";
        }
    }
}