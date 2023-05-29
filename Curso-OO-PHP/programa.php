<?php

require_once 'conta.php';
require_once 'cliente.php';

$cliente1 = new Cliente('Jorge', "123456",18);
$cliente2 = new Cliente('Pedro', "223422",19);
$cliente3 = new Cliente('Alekis','111111',28);
$conta1 = new Conta($cliente1,13,4512);
$conta2 = new Conta($cliente2,40,3340);
$conta3 = new Conta($cliente3,32,5151);

$conta1->depositar(300);
$conta1->transferir($conta2, 100);
var_dump("Var1",$conta1,$conta2);
$conta2->sacar(50);
$conta1->getSaldo();
$conta2->getNomeCliente();
var_dump("Var2",$conta1, $conta2);
$conta1->transferir($conta2, 500);
echo $conta2->getAgenciaENumero();
echo $conta1->informacoesDaConta();
echo $conta2->informacoesDaConta();
echo $conta3->informacoesDaConta();
unset($conta1);
echo Conta::getNumeroContas();
?>