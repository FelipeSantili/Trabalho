<?php

include_once (__DIR__ . "/../model/Categoria.php");
include_once (__DIR__ . "/../util/Connection.php");

class CategoriaDAO {

    public function list() {
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM categorias ORDER BY nome";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        $categorias = $this->mapDBToObject($result);
        return $categorias;
    }

    private function mapDBToObject(array $result) {
        $categorias = array();
        foreach ($result as $reg) {
            $categoria = new categoria();
            $categoria->setId($reg['id'])
                    ->setNome($reg['nome']);
            array_push($categorias, $categoria);
        }
        return $categorias;
    }
}
