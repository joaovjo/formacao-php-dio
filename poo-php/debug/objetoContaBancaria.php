<?php 

require_once __DIR__ . '/../vendor/autoload.php';

use App\ContaBancaria;

//$conta = new ContaBancaria();
// $conta->setNomeBanco('Itaú');
// $conta->setNomeTitular('João Vitor');
// $conta->setNumeroAgencia('6145-6');          get // set
// $conta->setNumeroConta('98753-6');
// $conta->setSaldo(1000);

$conta = new ContaBancaria(
    'Inter', // banco
    'João', // titular
    '9425', // agencia
    '64531-2', // conta
    0 // saldo
);

//var_dump($conta->exibirBancoTitular());
var_dump($conta->exibirDadosConta());

echo $conta->obterSaldo() . PHP_EOL;

echo $conta->depositar(500) . PHP_EOL;

echo $conta->obterSaldo() . PHP_EOL;

echo $conta->sacar(1100) . PHP_EOL;

echo $conta->obterSaldo() . PHP_EOL;