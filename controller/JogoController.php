<?php

include_once(__DIR__ . "/../dao/JogoDAO.php");
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../service/JogoService.php");

class JogoController {

    private JogoDAO $JogoDAO;
    private JogoService $JogoService;

    public function __construct() {
        $this->JogoDAO = new JogoDAO();
        $this->JogoService = new JogoService();
    }

    public function listar() {
        return $this->JogoDAO->list();
    }

    public function inserir(Jogo $Jogo) {
        $erros = $this->JogoService->validarDados($Jogo);
        if($erros)
            return $erros;

        $this->JogoDAO->insert($Jogo);
        return array();
    }

    public function alterar(Jogo $jogo) {
        $erros = $this->JogoService->validarDados($jogo);
        if($erros)
            return $erros;

        $erros = $this->JogoDAO->update($jogo);
        return $erros;
    }

    public function buscarPorId(int $idJogo) {
        return $this->JogoDAO->findById($idJogo);
    }

    public function excluirPorId(int $idJogo) {
        $this->JogoDAO->deleteById($idJogo);
    }

}
