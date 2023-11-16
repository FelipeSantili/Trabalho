<?php

include_once(__DIR__ . "/../model/Categoria.php");
include_once(__DIR__ . "/../model/Plataforma.php");

class Jogo {
    private ?int $id;
    private ?string $nome;
    private ?int $anoLancamento;
    private ?string $empresa;
    private ?int $preco;
    private ?Categoria $categoria;
    private ?Plataforma $plataforma;

    public function __construct() {
        $this->id = 0;
        $this->categoria = null;
        $this->plataforma = null;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id) {
        $this->id = $id;

        return $this;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome(?string $nome) {
        $this->nome = $nome;

        return $this;
    }

    public function getAnoLancamento(): ?int {
        return $this->anoLancamento;
    }

    public function setanoLancamento(?int $anoLancamento) {
        $this->anoLancamento = $anoLancamento;

        return $this;
    }

    public function getEmpresa(): ?string {
        return $this->empresa;
    }

    public function setEmpresa(?string $empresa) {
        $this->empresa = $empresa;

        return $this;
    }

    public function getPreco(): ?int {
        return $this->preco;
    }

    public function setPreco(?int $preco) {
        $this->preco = $preco;

        return $this;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria) {
        $this->categoria = $categoria;

        return $this;
    }

    public function getPlataforma() {
        return $this->plataforma;
    }

    public function setPlataforma(?Plataforma $plataforma){
        $this->plataforma = $plataforma;

        return $this;
    }
}
