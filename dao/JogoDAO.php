<?php

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Jogo.php");

class JogoDAO {

    public function list() {
        $conn = Connection::getConnection();
    
        $sql = "SELECT j.*, c.nome AS nome_categorias, p.nome AS nome_plataformas" .
               " FROM jogos j" .
               " JOIN categorias c ON (c.id = j.id_categoria)" .
               " JOIN plataformas p ON (p.id = j.id_plataforma)" .
               " ORDER BY j.id";
    
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapDBToObject($result);
    }
    

    public function insert(Jogo $jogo){
        $conn = Connection::getConnection();

        $sql = "INSERT INTO jogos (nome, empresa," . " id_categoria, " . " anoLancamento," . " id_plataforma," . " descricao, preco)" .
            " VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getEmpresa(),
            $jogo->getCategoria()->getId(),
            $jogo->getAnoLancamento(),
            $jogo->getPlataforma()->getId(),
            $jogo->getDescricao(),
            $jogo->getPreco(),
        ));
    }

    private function mapDBToObject(array $result) {
        $jogos = array();
        foreach($result as $reg) {
            $jogo = new jogo();
            $jogo->setId($reg['id']);
            $jogo->setNome($reg['nome']);
            $jogo->setEmpresa($reg['empresa']);

            $categoria = new Categoria();
            $categoria->setId($reg['id_categoria']);
            $categoria->setNome($reg['nome_categorias']);
            $jogo->setCategoria($categoria);

            $jogo->setAnoLancamento($reg['anoLancamento']);

            $plataforma = new Plataforma();
            $plataforma->setId($reg['id_plataforma']);
            $plataforma->setNome($reg['nome_plataformas']);
            $jogo->setPlataforma($plataforma);

            $jogo->setDescricao($reg['descricao']);
            $jogo->setPreco($reg['preco']);


            array_push($jogos, $jogo);
        }
        return $jogos;
    }

    public function findById(int $idJogo) {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.nome AS nome_categorias, p.nome AS nome_plataformas" .
            " FROM jogos j" .
            " JOIN categorias c ON (c.id = j.id_categoria)" .
            " JOIN plataformas p ON (p.id = j.id_plataforma)" .
            " WHERE j.id = ?" .
            " ORDER BY p.nome";


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

    public function findByNome(string $nomeJogo) {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.nome AS nome_categorias, p.nome AS nome_plataformas" .
        " FROM jogos j" .
        " JOIN categorias c ON (c.id = j.id_categoria)" .
        " JOIN plataformas p ON (p.id = j.id_plataforma)" .
        " WHERE j.nome = ?" .
        " ORDER BY p.nome";
        $stm = $conn->prepare($sql);
        $stm->execute(array($nomeJogo));
        $result = $stm->fetchAll();
        
        $jogos = $this->mapDBToObject($result);
        if($jogos)
            return $jogos[0];
        else
            return null;
    }

    public function update(Jogo $jogo){
        $conn = Connection::getConnection();

        $sql = "UPDATE jogos SET nome = ?," . 
            " Empresa = ?, id_categoria = ?, anoLancamento = ?," .
            "  id_plataforma = ?, descricao = ?, preco = ?" .
            " WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getEmpresa(),
            $jogo->getCategoria()->getId(),
            $jogo->getAnoLancamento(),
            $jogo->getPlataforma()->getId(),
            $jogo->getDescricao(),
            $jogo->getPreco(),
            $jogo->getId()
        ));
    }

    public function deleteById(int $idJogo){
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
    }
}
