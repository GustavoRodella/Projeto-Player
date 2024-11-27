<?php
include_once('Player.php');
include_once('Ataque.php');
include_once('Defesa.php');
include_once('Magia.php');

$player1 = new Player("Rodella");

$itemAtaque1 = new Ataque("Espada");
$itemAtaque2 = new Ataque("Machado");
$itemDefesa1 = new Defesa("Escudo");
$itemDefesa2 = new Defesa("Armadura");
$itemMagia1 = new Magia("Fogo");
$itemMagia2 = new Magia("Gelo");

echo "<hr>";
echo "<h3>Coletando Itens</h3>";
$player1->coletarItem($itemAtaque1);
$player1->coletarItem($itemDefesa1);
$player1->coletarItem($itemMagia1);
$player1->coletarItem($itemMagia2);
$player1->coletarItem($itemAtaque2);
$player1->coletarItem($itemDefesa2);

echo "<h3>Subindo de nível</h3>";
$player1->subirNivel();


echo "<h3>Tentando adicionar o item novamente </h3>";
$player1->coletarItem($itemAtaque2);


echo "<h3>Removendo um item </h3>";
$player1->soltarItem("Espada");


echo "<h3>Mostrando itens no inventário </h3>";
foreach ($player1->getInventario()->getItens() as $item) {
    echo "Item no inventário: {$item->getNome()}<br>";
}

echo "<hr>";

$player2 = new Player("Gomes");

$itemAtaque3 = new Ataque("Lança");
$itemAtaque4 = new Ataque("Arco");
$itemDefesa3 = new Defesa("Elmo");
$itemDefesa4 = new Defesa("Botas de Ferro");
$itemMagia3 = new Magia("Relâmpago");
$itemMagia4 = new Magia("Terra");

echo "<h3>Coletando Itens</h3>";
$player2->coletarItem($itemAtaque3);
$player2->coletarItem($itemAtaque4);
$player2->coletarItem($itemDefesa3);
$player2->coletarItem($itemMagia3);
$player2->coletarItem($itemDefesa4);
$player2->coletarItem($itemMagia4); // Deve falhar por falta de espaço

echo "<h3>Subindo de nível</h3>";
$player2->subirNivel();


echo "<h3>Tentando adicionar o item novamente </h3>";
$player2->coletarItem($itemMagia4);
$player2->coletarItem($itemDefesa4);

echo "<h3>Removendo um item </h3>";
$player2->soltarItem("Lança");


echo "<h3>Mostrando itens no inventário </h3>";
foreach ($player2->getInventario()->getItens() as $item) {
    echo "Item no inventário: {$item->getNome()}<br>";
}
?>