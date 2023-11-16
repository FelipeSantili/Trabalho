<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Jogo.php");

class JogoDAO {

    public function list() {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, p.nome AS nome_plataforma, c.nome AS nome_categoria" .
               " FROM Jogos j" .
               " JOIN plataformas p ON (p.id = j.id_plataforma)" .
               " JOIN categorias c ON (c.id = j.id_categoria)" .
               " ORDER BY j.id";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapDBToObject($result);
    }

    public function insert(Jogo $jogo){
        $conn = Connection::getConnection();

        $sql = "INSERT INTO jogos (nome, anoLancamento, empresa, preco," .
            " id_plataforma, id_categoria)" .
            " VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getAnoLancamento(),
            $jogo->getEmpresa(),
            $jogo->getPreco(),
            $jogo->getPlataforma()->getId(),
            $jogo->getCategoria()->getId()
        ));
    }

    private function mapDBToObject(array $result) {
        $jogos = array();
        foreach($result as $reg) {
            $jogo = new Jogo();
            $jogo->setId($reg['id']);
            $jogo->setNome($reg['nome']);
            $jogo->setAnoLancamento($reg['anoLancamento']);
            $jogo->setEmpresa($reg['empresa']);
            $jogo->setPreco($reg['preco']);

            $plataforma = new Plataforma();
            $plataforma->setId($reg['id_plataforma']);
            $plataforma->setNome($reg['nome_plataforma']);
            $jogo->setplataforma($plataforma);

            $categoria = new Categoria();
            $categoria->setId($reg['id_categoria']);
            $categoria->setNome($reg['nome_categoria']);
            $jogo->setcategoria($categoria);
            array_push($jogos, $jogo);
        }
        return $jogos;
    }

    public function findById(int $idJogo) {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, p.nome AS nome_plataforma, c.nome AS nome_categoria" .
            " FROM Jogos j" .
            " JOIN plataformas p ON (p.id = j.id_plataforma)" .
            " JOIN categorias c ON (c.id = j.id_categoria)" .
            " WHERE j.id = ?" .
            " ORDER BY c.nome";

        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
        $result = $stm->fetchAll();

        $jogos = $this->mapDBToObject($result);

        if($jogos) {
            return $jogos[0];
        } else {
            return null;
        }
    }

    public function findByNome(string $NomeJogo) {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, p.nome AS nome_plataforma, c.nome AS nome_categoria" .
        " FROM Jogos j" .
        " JOIN plataformas p ON (p.id = j.id_plataforma)" .
        " JOIN categoriaes c ON (c.id = j.id_categoria)" .
        " WHERE j.Nome = ?" .
        " ORDER BY c.nome";
        $stm = $conn->prepare($sql);
        $stm->execute(array($NomeJogo));
        $result = $stm->fetchAll();
        
        $jogos = $this->mapDBToObject($result);
        if($jogos)
            return $jogos[0];
        else
            return null;
    }

    public function update(Jogo $Jogo){
        try {
            $conn = Connection::getConnection();
    
            $sql = "UPDATE Jogos SET Nome = ?," . 
                " anoLancamento = ?, empresa = ?," .
                " preco= ?, id_plataforma = ?, id_categoria = ?" .
                " WHERE id = ?";
            $stm = $conn->prepare($sql);
            $stm->execute(array(
                $Jogo->getNome(),
                $Jogo->getAnoLancamento(),
                $Jogo->getEmpresa(),
                $Jogo->getPreco(),
                $Jogo->getPlataforma()->getId(),
                $Jogo->getCategoria()->getId(),
                $Jogo->getId()
            ));

            if ($stm->rowCount() > 0) {
                return array();
            } else {
                return array("Erro ao atualizar o jogo.");
            }
        } catch (PDOException $e) {
            return array("Erro durante a atualização: " . $e->getMessage());
        }
    }
    

    public function deleteById(int $idJogo){
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
    }
}
