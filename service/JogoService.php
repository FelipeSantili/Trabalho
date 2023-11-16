<?php

include_once(__DIR__ . "/../model/Jogo.php");

class JogoService {

    public function validarDados(Jogo $jogo) {
        $erros = array();

        if (!$jogo->getNome())
            array_push($erros, "Informe o Nome!");

        if (!$jogo->getAnoLancamento())
            array_push($erros, "Informe o ano de lançamento!");

        if (!$jogo->getEmpresa())
            array_push($erros, "Informe o nome da Empresa!");

        if ($jogo->getPreco() === null || $jogo->getPreco() < 0) {
            array_push($erros, "Informe um preço válido para o jogo!");
        }

        if (!$jogo->getCategoria())
            array_push($erros, "Informe a categoria!");

        if (!$jogo->getPlataforma())
            array_push($erros, "Informe a plataforma do jogo");

        return $erros;
    }
}
