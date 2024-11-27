<?php

class Inventario {
    private int $capacidadeMaxima;
    private array $itens;

    public function __construct(int $capacidadeMaxima = 20) {
        $this->capacidadeMaxima = $capacidadeMaxima;
        $this->itens = [];
    }

    public function getCapacidadeMaxima(): int {
        return $this->capacidadeMaxima;
    }

    public function getItens(): array {
        return $this->itens;
    }

    public function setCapacidadeMaxima(int $capacidadeMaxima): bool {
        if ($capacidadeMaxima <= 0) {
            echo "A capacidade máxima deve ser maior que zero. <br>";
            return false;
        }
        if (!empty($this->itens) && count($this->itens) > $capacidadeMaxima) {
            echo "A nova capacidade máxima não pode ser menor do que a quantidade atual de itens. <br>";
            return false;
        }
        $this->capacidadeMaxima = $capacidadeMaxima;
        return true;
    }

    public function setItens(array $itens): bool {
        if (count($itens) > $this->capacidadeMaxima) {
            echo "A quantidade de itens excede a capacidade máxima. <br>";
            return false;
        }
        foreach ($itens as $item) {
            if (!$item instanceof Item) {
                echo "Todos os elementos devem ser instâncias da classe Item. <br>";
                return false;
            }
        }
        $this->itens = $itens;
        return true;
    }

    public function adicionarItem(Item $item): bool {
        if ($this->capacidadeLivre() >= $item->getTamanho()) {
            $this->itens[] = $item;
            return true;
        } else {
            echo "Capacidade insuficiente para adicionar o item: " . $item->getNome() . "<br>";
            return false;
        }
    }

    public function removerItem(string $nomeItem): bool {
        foreach ($this->itens as $index => $item) {
            if ($item->getNome() === $nomeItem) {
                unset($this->itens[$index]);
                $this->itens = array_values($this->itens);
                return true;
            }
        }
        echo "Item não encontrado: $nomeItem\n";
        return false;
    }

    public function aumentarCapacidade(int $quantidade): void {
        $this->capacidadeMaxima += $quantidade;
    }

    public function capacidadeLivre(): int {
        $espacoOcupado = array_reduce($this->itens, fn($carry, $item) => $carry + $item->getTamanho(), 0);
        return $this->capacidadeMaxima - $espacoOcupado;
    }
}

?>