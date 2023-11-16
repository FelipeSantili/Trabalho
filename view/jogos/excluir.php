<?php

include_once(__DIR__ . "/../../controller/JogoController.php");

$idJogo = 0;
if(isset($_GET['id']))
    $idJogo = $_GET['id'];

$jogoCont = new JogoController();
$jogo = $jogoCont->buscarPorId($idJogo);

if(!$jogo) {
    echo "Jogo não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

$jogoCont->excluirPorId($jogo->getId());

header("location: listar.php");
