<?php

include_once(__DIR__ . "/../../model/Aluno.php");
include_once(__DIR__ . "/../../model/Curso.php");
include_once(__DIR__ . "/../../controller/AlunoController.php");

$msgErros = "";
$aluno = null;

if(isset($_POST['submetido'])) {
    //Captura o valor dos inputs do formulário
    $nome = trim($_POST['nome']);
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrangeiro = trim($_POST['estrang']);
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //Criar um objeto aluno
    $aluno = new Aluno();
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);
    if($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }
    //print_r($aluno);

    //Chamar o controller para inserir o aluno (persistir o objeto)
    $alunoCont = new AlunoController();
    $erros = $alunoCont->inserir($aluno);

    //Caso não tenha erros, redirecionar para o listagem
    if(! $erros) {
        header("location: listar.php");
        exit;
    }

    //Exibir os erros para o usuário
    //print_r($erros);
    $msgErros = implode("<br>", $erros);
}


include_once(__DIR__ . "/form.php");