<?php
//Controller para curso

include_once(__DIR__ . "/../dao/CursoDAO.php");

class CategoriaController {

    private CategoriaDAO $categoriaDAO;

    public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();        
    }

    public function listar() {
        return $this->categoriaDAO->list();
    }
}