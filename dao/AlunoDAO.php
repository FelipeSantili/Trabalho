<?php 
//Classe DAO para Aluno

include_once(__DIR__ . "/../util/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO {

    public function list() {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*, c.nome AS nome_curso" . 
               " FROM alunos a" . 
               " JOIN cursos c ON (c.id = a.id_curso)" . 
               " ORDER BY a.nome";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        return $this->mapDBToObject($result);
    }

    public function findById(int $idAluno) {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*, c.nome AS nome_curso" . 
               " FROM alunos a" . 
               " JOIN cursos c ON (c.id = a.id_curso)" . 
               " WHERE a.id = ?" .
               " ORDER BY a.nome";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idAluno));
        $result = $stm->fetchAll();
        
        $alunos = $this->mapDBToObject($result);
        if($alunos)
            return $alunos[0];
        else
            return null;
    }

    public function findByNome(string $nomeAluno) {
        $conn = Connection::getConnection();

        $sql = "SELECT a.*, c.nome AS nome_curso" . 
               " FROM alunos a" . 
               " JOIN cursos c ON (c.id = a.id_curso)" . 
               " WHERE a.nome = ?" .
               " ORDER BY a.nome";
        $stm = $conn->prepare($sql);
        $stm->execute(array($nomeAluno));
        $result = $stm->fetchAll();
        
        $alunos = $this->mapDBToObject($result);
        if($alunos)
            return $alunos[0];
        else
            return null;
    }

    public function insert(Aluno $aluno) {
        $conn = Connection::getConnection();

        $sql = "INSERT INTO alunos (nome, idade, estrangeiro, id_curso)" .
                " VALUES (?, ?, ?, ?)" ;
        $stm = $conn->prepare($sql);
        $stm->execute(array($aluno->getNome(), $aluno->getIdade(),
                            $aluno->getEstrangeiro(), 
                            $aluno->getCurso()->getId()));
    }

    public function update(Aluno $aluno) {
        $conn = Connection::getConnection();

        $sql = "UPDATE alunos SET nome = ?, idade = ?," . 
                    " estrangeiro = ?, id_curso = ?" . 
                " WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($aluno->getNome(), $aluno->getIdade(),
                            $aluno->getEstrangeiro(), 
                            $aluno->getCurso()->getId(), 
                            $aluno->getId()));
    }

    public function deleteById(int $idAluno) {
        $conn = Connection::getConnection();

        $sql = "DELETE FROM alunos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($idAluno));
    }

    private function mapDBToObject(array $result) {
        $alunos = array();
        foreach($result as $reg) {
            $aluno = new Aluno();
            $aluno->setId($reg['id']);
            $aluno->setNome($reg['nome']);
            $aluno->setIdade($reg['idade']);
            $aluno->setEstrangeiro($reg['estrangeiro']);
            
            $curso = new Curso();
            $curso->setId($reg['id_curso']);
            $curso->setNome($reg['nome_curso']);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }
        return $alunos;
    }

}