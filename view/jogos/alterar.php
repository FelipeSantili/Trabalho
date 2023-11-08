<?php
// View para alterar um jogo

include_once(__DIR__ . "/../../controller/JogoController.php");
include_once(__DIR__ . "/../../model/Jogo.php");

$msgErros = "";
$jogo = null;

if (isset($_POST['submetido'])) {


    $idJogo = $_POST['id_jogo'];
    $nome = trim($_POST['nome']);
    $categoria = $_POST['categoria']; 
    $preco = is_numeric($_POST['preco']) ? $_POST['preco']: null;
    $anoLancamento = is_numeric($_POST['anoLancamento']) ? $_POST['anoLancamento'] : null;
    $descricao = trim($_POST['descricao']);
    $empresa = trim($_POST['empresa']);

    // Criar um objeto jogo
    $jogo = new Jogo();
    $jogo->setId($idJogo);
    $jogo->setNome($nome);
    $jogo->setCategoria($categoria);
    $jogo->setPreco($preco);
    $jogo->setAnoLancamento($anoLancamento);
    $jogo->setDescricao($descricao);
    $jogo->setEmpresa($empresa);

   
    $jogoCont = new JogoController();
    $erros = $jogoCont->alterar($jogo);

    
    if (empty($erros)) {
        header("location: listar.php");
        exit;
    }

    
    $msgErros = implode("<br>", $erros);
} else {
    
    $idJogo = 0;
    if (isset($_GET['id'])) {
        $idJogo = $_GET['id'];

        $jogoCont = new JogoController();
        $jogo = $jogoCont->buscarPorId($idJogo);

        if (!$jogo) {
            echo "Jogo não encontrado!<br>";
            echo "<a href='listar.php'>Voltar</a>";
            exit;
        }
    } else {
        
        header("location: listar.php");
        exit;
    }
}

include_once(__DIR__ . "/form.php");