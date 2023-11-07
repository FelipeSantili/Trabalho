<?php
//Modelo para Aluno

include_once(__DIR__ . "/Categoria.php");

class Jogo {

    private ?int $id;
    private ?string $nome; 
    private ?int $empresa;
    private ?string $categoria;


    //Construtor da classe
    public function __construct() {
        $this->id = 0;
        $this->categoria = null;        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of idade
     */ 
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set the value of idade
     *
     * @return  self
     */ 
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function getECategoriaDesc() {
        switch($this->categoria) {
            case 'A':
                return "Ação";
            case 'R':
                return "RPG";
            case 'E':
                return "Esporte";
            case 'S':
                return "Simulação";
            case 'V':
                return "Aventura";
            case 'P':
                return "Puzzle";
            default:
                return "";
        }
    }
    

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}