<?php

declare(strict_types=1);

namespace App\ContasTipo;

use App\ContaBancaria;

class ContaCorrente extends ContaBancaria
{
    const TAXA = 25;
    const TIPO_CONTA = 'Conta Corrente';

    public function __construct(
        string $nomeBanco,
        string $nomeTitular,
        string $numeroAgencia,
        string $numeroConta,
        float $saldo
    ) {
        //parent acessa o construtor / método da classe pai
        parent::__construct($nomeBanco, $nomeTitular, $numeroAgencia, $numeroConta, $saldo);
    }

    public function obterSaldo(): string {
        //saldo - taxa de 25 reais e a formatação do número
        return 'Saldo atual da conta corrente: R$ ' . number_format(($this->saldo - self::TAXA), 2, ',', '.'); //self acessa a propriedade/método da própria classe que ta sendo usada, é tipo um "eu mesmo", uma referência a si mesmo
    }
}
