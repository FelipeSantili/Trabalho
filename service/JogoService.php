<?php

include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../dao/JogoDAO.php");

class JogoService {

    private JogoDAO $jogoDAO;

    public function __construct() {
        $this->jogoDAO = new JogoDAO();        
    }

    public function validarDados(Jogo $jogo) {
        $erros = array();

        //Validação do campo nome
        if(! $jogo->getNome())
            array_push($erros, "Informe o nome!");
        else {
            //Validar se um jogo com o mesmo nome já foi cadastrado
            $jogoMesmoNome = $this->jogoDAO->findByNome($jogo->getNome());
            if($jogoMesmoNome && $jogoMesmoNome->getId() != $jogo->getId())
                array_push($erros, "Um jogo com este nome já foi cadastrado!");
        }

       
        if(! $jogo->getEmpresa())
            array_push($erros, "Informe o nome da empresa!");

        
        if(! $jogo->getCategoria())
            array_push($erros, "Informe a categoria!");

        return $erros;
    }

}