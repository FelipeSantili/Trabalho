<?php

include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../model/Categoria.php");
include_once(__DIR__ . "/../../model/Plataforma.php");
include_once(__DIR__ . "/../../controller/JogoController.php");

$msgErros = "";
$jogo = null;

if(isset($_POST['submetido'])){
    
    $nome = trim($_POST['nome']);
    $anoLancamento = is_numeric($_POST['anoLancamento']) ? $_POST['anoLancamento'] : NULL;
    $empresa = trim($_POST['empresa']);
    $preco = is_numeric($_POST['preco']) ? $_POST['preco']: null;
    $idCategoria = is_numeric($_POST['categoria']) ? $_POST['categoria'] : NULL;
    $idPlataforma = is_numeric($_POST['plataforma']) ? $_POST['plataforma'] : NULL;

    $jogo = new jogo();
    $jogo->setNome($nome)
        ->setAnoLancamento($anoLancamento)
        ->setempresa($empresa)
        ->setpreco($preco);

    if ($idCategoria) {
        $categoria = new Categoria();
        $categoria->setId($idCategoria);
        $jogo->setCategoria($categoria);
    }

    if ($idPlataforma) {
        $plataforma = new Plataforma();
        $plataforma->setId($idPlataforma);
        $jogo->setPlataforma($plataforma);
    }

    $jogoCont = new jogoController();
    $erros = $jogoCont->inserir($jogo);

    if (!$erros) {
        header("location: listar.php");
        exit;
    }

    $msgErros = implode("<br>", $erros);
}

include_once(__DIR__ . "/form.php");
