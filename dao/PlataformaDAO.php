<?php

include_once (__DIR__ . "/../model/Plataforma.php");
include_once (__DIR__ . "/../util/Connection.php");

class PlataformaDAO {

    public function list() {
        $conn = Connection::getConnection();

        $sql = "SELECT * FROM plataformas ORDER BY nome";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        $plataformas = $this->mapDBToObject($result);
        return $plataformas;
    }

    private function mapDBToObject(array $result) {
        $plataformas = array();
        foreach ($result as $reg) {
            $plataforma = new Plataforma();
            $plataforma->setId($reg['id'])
                    ->setNome($reg['nome']);
            array_push($plataformas, $plataforma);
        }
        return $plataformas;
    }
}
