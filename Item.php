<?php

class Item {
    public string $nome;
    public int $tamanho;
    public string $classe;

    public function __construct(string $nome, int $tamanho, string $classe) {
        $this->nome = $nome;
        $this->tamanho = $tamanho;
        $this->classe = $classe;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getTamanho(): int {
        return $this->tamanho;
    }

    public function getClasse(): string {
        return $this->classe;
    }

    public function setNome(string $nome): void {
        if (empty($nome)){
            echo "Nome nao pode ser vazio. <br>";
        }
        else{
            $this->nome = $nome;
        }
    }
    
    public function setTamanho(int $tamanho): void {
        if ($tamanho <= 0){
            echo "Tamanho não pode ser menor ou igual a zero. <br>";
        }
        else{
            $this->tamanho = $tamanho;
        }
    }
    
    public function setClasse(string $classe): void {
        if (empty($classe)){
            echo "Classe nao pode ser vazio. <br>";
        }
        else{
            $this->classe = $classe;
        }
    }
}

?>