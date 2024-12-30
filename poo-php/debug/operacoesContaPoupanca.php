<?php 

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\ContasTipo\ContaPoupanca;
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

$conta = new ContaPoupanca(
    'CEF', //nomeBanco
    'João', //nomeTitular
    '5612',//numeroAgencia
    '45616-2',//numeroConta
    0//saldo
);

exibirDados($conta);
executarOperacoes($conta);