<?php
//View para excluir alunos
include_once(__DIR__ . "/../../controller/AlunoController.php");

//Recebe o ID do aluno por parâmetro GET
$idAluno = 0;
if(isset($_GET['id']))
    $idAluno = $_GET['id'];

//Validar se o aluno com o ID recebido existe
$alunoCont = new AlunoController();
$aluno = $alunoCont->buscarPorId($idAluno);

//Verifica se o aluno foi encontrado
if(! $aluno) {
    echo "Aluno não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
    exit;
}

//print_r($aluno);

//Excluir o aluno
$alunoCont->excluirPorId($aluno->getId());

//Redireciona para o listar
header("location: listar.php");