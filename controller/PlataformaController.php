<?php

include_once(__DIR__ . "/../dao/PlataformaDAO.php");

class PlataformaController {

    private PlataformaDAO $plataformaDAO;

    public function __construct() {
        $this->plataformaDAO = new PlataformaDAO();        
    }

    public function listar() {
        return $this->plataformaDAO->list();
    }
}
