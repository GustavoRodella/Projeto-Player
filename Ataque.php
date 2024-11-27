<?php
include_once('Item.php');

class Ataque extends Item {
    public function __construct(string $nome) {
        parent::__construct($nome, 7, "Ataque");
    }
}

?>