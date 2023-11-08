<?php
include_once(__DIR__ . "/../../model/Jogo.php");
include_once(__DIR__ . "/../../controller/JogoController.php");

$msgErros = "";
$jogo = null;

if (isset($_POST['submetido'])) {
   
    $nome = trim($_POST['nome']);
    $empresa = trim($_POST['empresa']);
    $categoria = trim($_POST['categoria']);
    $anoLancamento = is_numeric($_POST['anoLancamento']) ? $_POST['anoLancamento'] : null;
    $descricao = trim($_POST['descricao']);
    $preco = is_numeric($_POST['preco']) ? $_POST['preco'] : null; 

    
    $jogo = new Jogo();
    $jogo->setNome($nome);
    $jogo->setEmpresa($empresa);
    $jogo->setCategoria($categoria);
    $jogo->setAnoLancamento($anoLancamento);
    $jogo->setDescricao($descricao);
    $jogo->setPreco($preco);

   
    $jogoCont = new JogoController();
    $erros = $jogoCont->inserir($jogo);

    
    if (empty($erros)) {
        header("location: listar.php");
        exit;
    }


    $msgErros = implode("<br>", $erros);
}

include_once(__DIR__ . "/form.php");
