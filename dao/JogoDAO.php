<?php
include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Jogo.php");

class JogoDAO {
    public function list() {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM jogo";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapDBToObject($result);
    }

    public function listGeneros() {
        $conn = Connection::getConnection();
        $sql = "SELECT DISTINCT genero FROM jogo";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $generos = array();
        foreach ($result as $reg) {
            $generos[] = $reg['genero'];
        }

        return $generos;
    }

    public function listPlataformas() {
        $conn = Connection::getConnection();
        $sql = "SELECT DISTINCT plataforma FROM jogo";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $plataformas = array();
        foreach ($result as $reg) {
            $plataformas[] = $reg['plataforma'];
        }

        return $plataformas;
    }

    public function findById(int $idJogo) {
        $conn = Connection::getConnection();
        $sql = "SELECT * FROM jogo WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
        $result = $stm->fetchAll();

        $jogos = $this->mapDBToObject($result);
        if ($jogos)
            return $jogos[0];
        else
            return null;
    }

    public function insert(Jogo $jogo) {
        $conn = Connection::getConnection();
        $sql = "INSERT INTO jogo (nome, empresa, categoria, anoLancamento, descricao, preco) VALUES (?, ?, ?, ?, ?, ?)";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getEmpresa(),
            $jogo->getCategoria(),
            $jogo->getAnoLancamento(),
            $jogo->getDescricao(),
            $jogo->getPreco()
        ));
    }

    public function update(Jogo $jogo) {
        $conn = Connection::getConnection();
        $sql = "UPDATE jogo SET nome = ?, empresa = ?, categoria = ?, anoLancamento = ?, descricao = ?, preco = ? WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array(
            $jogo->getNome(),
            $jogo->getEmpresa(),
            $jogo->getCategoria(),
            $jogo->getAnoLancamento(),
            $jogo->getDescricao(),
            $jogo->getPreco(),
            $jogo->getId()
        ));
    }

    public function deleteById(int $idJogo) {
        $conn = Connection::getConnection();
        $sql = "DELETE FROM jogo WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idJogo));
    }

    private function mapDBToObject(array $result) {
        $jogos = array();
        foreach ($result as $reg) {
            $jogo = new Jogo();
            $jogo->setId($reg['id']);
            $jogo->setNome($reg['nome']);
            $jogo->setEmpresa($reg['empresa']);
            $jogo->setCategoria($reg['categoria']);
            $jogo->setAnoLancamento($reg['anoLancamento']);
            $jogo->setDescricao($reg['descricao']);
            $jogo->setPreco($reg['preco']);
            $jogos[] = $jogo;
        }
        return $jogos;
    }
}

?>
