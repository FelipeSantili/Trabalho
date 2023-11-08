<?php
// Controller para o modelo de Jogo

include_once(__DIR__ . "/../dao/JogoDAO.php");
include_once(__DIR__ . "/../model/Jogo.php");
include_once(__DIR__ . "/../service/JogoService.php");

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
        if ($erros) {
            return $erros;
        }

        $this->jogoDAO->insert($jogo);
        return array();
    }

    public function alterar(Jogo $jogo) {
        $erros = $this->jogoService->validarDados($jogo);
        if ($erros) {
            return $erros;
        }

        $this->jogoDAO->update($jogo);
        return array();
    }

    public function buscarPorId(int $idJogo) {
        return $this->jogoDAO->findById($idJogo);
    }

    public function excluirPorId(int $idJogo) {
        $this->jogoDAO->deleteById($idJogo);
    }

    public function listarGeneros() {
        return $this->jogoDAO->listGeneros();
    }

    public function listarPlataformas() {
        return $this->jogoDAO->listPlataformas();
    }
}
?>
