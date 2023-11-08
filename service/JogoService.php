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

        if (empty($jogo->getNome())) {
            array_push($erros, "O campo Nome é obrigatório.");
        }

        if (empty($jogo->getEmpresa())) {
            array_push($erros, "O campo Empresa é obrigatório.");
        }

        if (empty($jogo->getCategoria())) {
            array_push($erros, "O campo Categoria é obrigatório.");
        }

        if (empty($jogo->getAnoLancamento())) {
            array_push($erros, "O campo Ano de Lançamento é obrigatório.");
        }

        if (empty($jogo->getDescricao())) {
            array_push($erros, "O campo Descrição é obrigatório.");
        }

        if (empty($jogo->getPreco())) {
            array_push($erros, "O campo Preço é obrigatório.");
        }



        return $erros;
    }

    public function listarJogos() {
        return $this->jogoDAO->list();
    }

    public function inserirJogo(Jogo $jogo) {
        $erros = $this->validarDados($jogo);

        if (empty($erros)) {
            $this->jogoDAO->insert($jogo);
        }

        return $erros;
    }

    public function atualizarJogo(Jogo $jogo) {
        $erros = $this->validarDados($jogo);

        if (empty($erros)) {
            $this->jogoDAO->update($jogo);
        }

        return $erros;
    }

    public function buscarJogoPorId($id) {
        return $this->jogoDAO->findById($id);
    }

    public function excluirJogo($id) {
        $this->jogoDAO->deleteById($id);
    }
}
