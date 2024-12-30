<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\ContasTipo\ContaCorrente;
use App\Contratos\DadosContaBancariaInterface;
use App\Contratos\OperacoesContaBancariaInterface;

function executarOperacoes(OperacoesContaBancariaInterface $conta): void
{
    echo $conta->obterSaldo();
    echo PHP_EOL;

    echo $conta->depositar(50);
    echo PHP_EOL;

    echo $conta->obterSaldo();
    echo PHP_EOL;

    echo $conta->sacar(30);
    echo PHP_EOL;

    echo $conta->obterSaldo();
    echo PHP_EOL;
}

function exibirDados(DadosContaBancariaInterface $conta): void {
    echo "Banco: " . $conta->getNomeBanco() . PHP_EOL;

    echo "Ag./Conta: " . $conta->getNumeroAgencia() . "/" . $conta->getNumeroConta() . PHP_EOL;

    echo "Titular: " . $conta->getNomeTitular() . PHP_EOL;

    echo "---------------------------------" . PHP_EOL;
}

$conta = new ContaCorrente(
    'Banco do Brasil', //nomeBanco
    'João Vitor', //nomeTitular
    '9876-5',//numeroAgencia
    '12654-7',//numeroConta
    0//saldo
);

exibirDados($conta);
executarOperacoes($conta);
