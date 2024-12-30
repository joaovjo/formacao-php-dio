<?php

declare(strict_types=1);

class Venda {
    private DateTime $data;
    private string $produto;
    private int $quantidade;
    private float $valorTotal;

    public function __construct(string $data, $produto, $quantidade, $valorTotal) {
        $this->data = new DateTime($data);
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->valorTotal = $valorTotal;
    }

    public function getData(): DateTime {
        return $this->data;
    }

    public function getProduto(): string {
        return $this->produto;
    }

    public function getQuantidade(): int {
        return $this->quantidade;
    }

    public function getValorTotal(): float {
        return $this->valorTotal;
    }

    
}

$venda = new Venda('2024/04/11', 'Boné', 3, 100.00);

echo $venda->getData()->format('d/m/Y');