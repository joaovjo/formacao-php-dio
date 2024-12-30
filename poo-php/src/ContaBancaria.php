<?php

declare(strict_types=1);

namespace App;

use App\Contratos\DadosContaBancariaInterface;
use App\Contratos\OperacoesContaBancariaInterface;

abstract class ContaBancaria implements DadosContaBancariaInterface, OperacoesContaBancariaInterface

/* 

classe abstrata não pode ser instanciada, só pode ser herdada, não da pra fazer um new ContaBancaria
obrigratoriamente as classes que herdam de ContaBancaria devem implementar o método abstrato
ContaCorrente e ContaPoupanca são classes filhas de ContaBancaria, e obrigatoriamente devem implementar a ContaBancaria
class ContaCorrente extends ContaBancaria
class ContaPoupanca extends ContaBancaria

*/
{
    /*
    
    acesso public, private e protected
    public = qualquer classe vê
    private = só a classe que usa vê
    protected = classe pai e filhos tem acesso 
    
    */
    protected string $nomeBanco;
    protected string $nomeTitular;
    protected string $numeroAgencia;
    protected string $numeroConta;
    protected float $saldo;

    public function __construct (
        string $nomeBanco,
        string $nomeTitular,
        string $numeroAgencia,
        string $numeroConta,
        float $saldo
    ) {
        $this->nomeBanco = $nomeBanco;
        $this->nomeTitular = $nomeTitular;
        $this->numeroAgencia = $numeroAgencia;
        $this->numeroConta = $numeroConta;
        $this->saldo = $saldo;
    }

    public function exibirDadosConta(): array
    {
        return [
            'nomeBanco' => $this->nomeBanco, //this acessa a propriedade/método da própria classe
            'nomeTitular' => $this->nomeTitular, //this acessa a propriedade nomeTitular da classe ContaBancaria
            'numeroAgencia' => $this->numeroAgencia,
            'numeroConta' => $this->numeroConta,
            'saldo' => $this->saldo,
        ];
    }

    public function depositar(float $valor): string
    {
        $this->saldo += $valor;
        return 'Depósito de R$ ' . number_format($valor, 2, ".", "") . ' realizado com sucesso!';
    }

    public function sacar(float $valor): string
    {
        if ($valor > $this->saldo) {
            return 'Saldo insuficiente!';
        }

        $this->saldo -= $valor;
        return 'Saque de R$ ' . number_format($valor, 2, ".", "") . ' realizado com sucesso!';
    }

    public abstract function obterSaldo(): string; //método abstrato, obrigatoriamente deve ser implementado nas classes filhas, não define nada quem herda que define

    public function getNomeBanco(): string
    {
        return $this->nomeBanco;
    }

    public function getNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    public function getNumeroAgencia(): string
    {
        return $this->numeroAgencia;
    }

    public function getNumeroConta(): string
    {
        return $this->numeroConta;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

}