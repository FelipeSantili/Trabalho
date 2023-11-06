<?php

include_once(__DIR__ . "/../model/Aluno.php");
include_once(__DIR__ . "/../dao/AlunoDAO.php");

class AlunoService {

    private AlunoDAO $alunoDAO;

    public function __construct() {
        $this->alunoDAO = new AlunoDAO();        
    }

    public function validarDados(Aluno $aluno) {
        $erros = array();

        //Validação do campo nome
        if(! $aluno->getNome())
            array_push($erros, "Informe o nome!");
        else {
            //Validar se um aluno com o mesmo nome já foi cadastrado
            $alunoMesmoNome = $this->alunoDAO->findByNome($aluno->getNome());
            if($alunoMesmoNome && $alunoMesmoNome->getId() != $aluno->getId())
                array_push($erros, "Um aluno com este nome já foi cadastrado!");
        }

        //Validação do campo idade
        if(! $aluno->getIdade())
            array_push($erros, "Informe a idade!");
        else if($aluno->getIdade() <= 15) 
            array_push($erros, "O aluno deve ter no mínimo 15 anos!");

        //Validação do campo estrangeiro
        if(! $aluno->getEstrangeiro())
            array_push($erros, "Informe se o aluno é estrangeiro!");

        //Validação do campo curso
        if(! $aluno->getCurso())
            array_push($erros, "Informe o curso!");

        return $erros;
    }

}