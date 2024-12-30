<?php

declare(strict_types=1);

namespace App\ContasTipo;

use App\ContaBancaria;

class ContaPoupanca extends ContaBancaria {
    const RENDIMENTO = 0.03;
    protected const TIPO_CONTA = 'Conta Poupança';

    public function __construct(
        string $nomeBanco,
        string $nomeTitular,
        string $numeroAgencia,
        string $numeroConta,
        float $saldo
    ) {
        parent::__construct($nomeBanco, $nomeTitular, $numeroAgencia, $numeroConta, $saldo);
    }

    public function obterSaldo(): string {
        //saldo + rendimento de 3% e a formatação do número
        return 'Saldo atual da conta poupança: R$ ' . number_format($this->saldo + ($this->saldo * self::RENDIMENTO), 2, ',', '.');
    }

    public function getTipoConta(): string {
        return self::TIPO_CONTA;
    }
}