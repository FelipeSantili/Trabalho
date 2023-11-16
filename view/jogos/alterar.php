<?php

include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../model/Categoria.php");
include_once(__DIR__ . "/../../model/Plataforma.php");
include_once(__DIR__ . "/../../controller/JogoController.php");

$msgErros = "";
$jogo = null;

if(isset($_POST['submetido'])){

    $idJogo = $_POST['id_jogo'];
    $nome = trim($_POST['nome']);
    $anoLancamento = is_numeric($_POST['anoLancamento']) ? $_POST['anoLancamento'] : NULL;
    $empresa = trim($_POST['empresa']);
    $preco = is_numeric($_POST['preco']) ? $_POST['preco'] : NULL;
    $idCategoria = is_numeric($_POST['categoria']) ? $_POST['categoria'] : NULL;
    $idPlataforma = is_numeric($_POST['plataforma']) ? $_POST['plataforma'] : NULL;

    $jogo = new jogo();
    $jogo->setId($idJogo)
        ->setnome($nome)
        ->setAnoLancamento($anoLancamento)
        ->setEmpresa($empresa)
        ->setPreco($preco);

    if ($idCategoria) {
        $categoria = new Categoria();
        $categoria->setId($idCategoria);
        $jogo->setcategoria($categoria);
    }

    if ($idPlataforma) {
        $plataforma = new Plataforma();
        $plataforma->setId($idPlataforma);
        $jogo->setplataforma($plataforma);
    }

    $jogoCont = new JogoController();
    $erros = $jogoCont->alterar($jogo);

    if (!$erros) {
        header("location: listar.php");
        exit;
    }

    $msgErros = implode("<br>", $erros);
    
} else {

    $idJogo = 0;
    if(isset($_GET['id']))
        $idjogo = $_GET['id'];

    $jogoCont = new JogoController();
    $jogo = $jogoCont->buscarPorId($idjogo);

    if(!$jogo) {
        echo "jogo não encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");
