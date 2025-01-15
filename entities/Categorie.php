<?php

class Categorie {
    private string $nomCategorie;

    public function __construct(string $nomCategorie) {
        $this->nomCategorie = $nomCategorie;
    }

    public function getNomCategorie(): string {
        return $this->nomCategorie;
    }
}

?>