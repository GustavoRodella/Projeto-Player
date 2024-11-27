<?php
include_once('Inventario.php');

class Player {
    private string $nickname;
    private int $nivel;
    private Inventario $inventario;

    public function __construct(string $nickname) {
        $this->nickname = $nickname;
        $this->nivel = 1;
        $this->inventario = new Inventario();
        echo "<h1> Jogador {$nickname} entrou no jogo </h1>";
    }

    public function getNickname(): string {
        return $this->nickname;
    }

    public function getNivel(): int {
        return $this->nivel;
    }

    public function getInventario(): Inventario {
        return $this->inventario;
    }

    public function setNickname(string $nickname): void {
        if (empty($nickname)){
            echo "nick name não pode ser vazio. <br>";
        }
        else{
            $this->nickname = $nickname;
        }
    }

    public function setNivel(int $nivel): void {
        if ($nivel <= 0){
            echo "Nivel não pode ser menor ou igual a zero. <br>";
        }
        else{
            $this->nivel = $nivel;
        }
    }

    public function setInventario(Inventario $inventario): void {
        $this->inventario = $inventario;
    }

    public function coletarItem(Item $item): void {
        if ($this->inventario->adicionarItem($item)) {
            echo "{$this->nickname} coletou o item: {$item->getNome()} <br>";
        }
    }

    public function soltarItem(string $nomeItem): void {
        if ($this->inventario->removerItem($nomeItem)) {
            echo "{$this->nickname} soltou o item: {$nomeItem} <br>";
        }
    }

    public function subirNivel(): void {
        $this->nivel++;
        $aumentoCapacidade = $this->nivel * 3;
        $this->inventario->aumentarCapacidade($aumentoCapacidade);
        echo "{$this->nickname} subiu para o nível {$this->nivel} e a capacidade do inventário aumentou em {$aumentoCapacidade}. <br>";
    }
}

?>