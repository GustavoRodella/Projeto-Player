<?php
include_once('Item.php');

class Defesa extends Item {
    public function __construct(string $nome) {
        parent::__construct($nome, 4, "Defesa");
    }
}

?>