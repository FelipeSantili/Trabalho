<?php 
//Classe DAO para Aluno

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class JogoDAO {

    public function list() {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.nome AS nome_categoria" . 
               " FROM jogo j" . 
               " JOIN jogos jg ON (jg.id = j.id_categoria)" . 
               " ORDER BY j.nome";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapDBToObject($result);
    }

    public function findById(int $idJogo) {
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, jg.nome AS nome_categoria" . 
               " FROM jogo j" . 
               " JOIN jogos jg ON (jg.id = j.id_categoria)" . 
               " WHERE j.id = ?" .
               " ORDER BY j.nome";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
        $result = $stm->fetchAll();
        
        $jogos = $this->mapDBToObject($result);
        if($jogos)
            return $jogos[0];
        else
            return null;
    }

    public function findByNome(string $nomeJogo) {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*, c.nome AS nome_curso" . 
               " FROM jogo j" . 
               " JOIN jogos jg ON (jg.id = j.id_categoria)" . 
               " WHERE a.nome = ?" .
               " ORDER BY j.nome";
        $stm = $conn->prepare($sql);
        $stm->execute(array($nomeJogo));
        $result = $stm->fetchAll();
        
        $jogos = $this->mapDBToObject($result);
        if($jogos)
            return $jogos[0];
        else
            return null;
    }

    public function insert(Jogo $jogo) {
        $conn = Connection::getConnection();

        $sql = "INSERT INTO jogos(nome, empresa, categoria, id_jogo)" .
                " VALUES (?, ?, ?, ?)" ;
        $stm = $conn->prepare($sql);
        $stm->execute(array($jogo->getNome(), $jogo->getIdade(),
                            $jogo->getEstrangeiro(), 
                            $jogo->getCurso()->getId()));
    }

    public function update(Jogo $jogo) {
        $conn = Connection::getConnection();

        $sql = "UPDATE jogos SET nome = ?, empresa = ?," . 
                    " categoria = ?, id_jogo = ?" . 
                " WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($jogo->getNome(), $jogo->getIdade(),
                            $jogo->getEstrangeiro(), 
                            $jogo->getCurso()->getId(), 
                            $jogo->getId()));
    }

    public function deleteById(int $idJogo) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM jogos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
    }

    private function mapDBToObject(array $result) {
        $jogos = array();
        foreach($result as $reg) {
            $jogo = new Jogo();
            $jogo->setId($reg['id']);
            $jogo->setNome($reg['nome']);
            $jogo->setEmpresa($reg['empresa']);
            $jogo->setCategoria($reg['categoria']);
            
            array_push($jogos, $jogo);
        }
        return $jogos;
    }

}