<?php

declare(strict_types=1);

class ContaBancaria {

    /** // tipagem no PHP 7.3
     * @var string
     */
    private string $banco; // tipagem no PHP 7.4
    /**
     * @var string
     */
    private string $nomeTitular;
    /**
     * @var string
     */
    private string $numeroAgencia;
    /**
     * @var string
     */
    private string $numeroConta;
    /**
     * @var float
     */
    private float $saldo;

    public function __construct(string $banco, string $nomeTitular, string $numeroAgencia, string $numeroConta, float $saldo) {
        $this->banco = $banco;
        $this->nomeTitular = $nomeTitular;
        $this->numeroAgencia = $numeroAgencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
    }

    public function obterSaldo(): string {
        return number_format($this->saldo, 2, ',', '.');
    }

    public function depositar($valor): float {
        return $this->saldo += $valor;
    }

    public function sacar($valor) {
        return $this->saldo -= $valor;
    }
}

$conta = new ContaBancaria(
    'Santander',
    'João Vitor',
    '5431',
    '12345-6',
    0.0
);

//var_dump($conta);

echo 'Saldo: R$ ' . $conta->obterSaldo() . PHP_EOL;

$conta->depositar(300.00);

echo 'Saldo: R$ ' . $conta->obterSaldo() . PHP_EOL;

$conta->sacar(150.00);

echo 'Saldo: R$ ' . $conta->obterSaldo() . PHP_EOL;