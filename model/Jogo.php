<?php
// Modelo para Jogo
class Jogo {

    private $id;
    private $nome;
    private $empresa;
    private $categoria;
    private $anoLancamento;
    private $descricao;
    private $preco;


    public function __construct() {
        $this->id = 0;
        $this->categoria = null;
        $this->preco = 0.0;

    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmpresa() {
        return $this->empresa;
    }

    public function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }


    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getAnoLancamento() {
        return $this->anoLancamento;
    }

    public function setAnoLancamento($anoLancamento) {
        $this->anoLancamento = $anoLancamento;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }
}
?>
