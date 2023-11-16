<?php

class Categoria {
    private ?int $id;
    private ?string $nome;


    public function __toString() {
        return $this->nome;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    public function getNome(): ?string {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

}
