<?php
//Controller para o modelo de Aluno

include_once(__DIR__ . "/../dao/AlunoDAO.php");
include_once(__DIR__ . "/../model/Aluno.php");
include_once(__DIR__ . "/../service/AlunoService.php");

class JogoController {

    private JogoDAO $jogoDAO;
    private JogoService $jogoService;

    public function __construct() {
        $this->jogoDAO = new JogoDAO();
        $this->jogoService = new JogoService();
    }

    public function listar() {
        return $this->jogoDAO->list();
    }

    public function inserir(Jogo $jogo) {
        $erros = $this->jogoService->validarDados($jogo);
        if($erros)
            return $erros;

        $this->jogoDAO->insert($jogo);
        return array();
    }

    public function alterar(Jogo $jogo) {
        $erros = $this->jogoService->validarDados($jogo);
        if($erros)
            return $erros;

        $this->jogoDAO->update($jogo);
        return array();
    }

    public function buscarPorId(int $idJogo) {
        return $this->jogoDAO->findById($idJogo);
    }

    public function excluirPorId(int $idJogo) {
        $this->jogoDAO->deleteById($idJogo);
    }

}