<?php

class Cour {
   
    private ?int $idCour = null;
    private string $nomCour;
    private string $description;
    private ?string $video = null;
    private ?string $image = null;
    private ?string $document = null;
    private Categorie $categorie;
    private enseignant $enseignant;
    private string $dateCreation;

   
    public function __construct(
        ?int $idCour,
        string $nomCour,
        string $description,
        ?string $video,
        ?string $image,
        ?string $document,
        string $categorie,
        string $enseignant,
        string $dateCreation
    ) {
        $this->idCour = $idCour;
        $this->nomCour = $nomCour;
        $this->description = $description;
        $this->video = $video;
        $this->image = $image;
        $this->document = $document;
        $this->categorie = $categorie;
        $this->enseignant = $enseignant;
        $this->dateCreation = $dateCreation;
    }

    // Getters et Setters

    public function getIdCour(): ?int {
        return $this->idCour;
    }

    public function setIdCour(?int $idCour): void {
        $this->idCour = $idCour;
    }

    public function getNomCour(): string {
        return $this->nomCour;
    }

    public function setNomCour(string $nomCour): void {
        $this->nomCour = $nomCour;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public function getVideo(): ?string {
        return $this->video;
    }

    public function setVideo(?string $video): void {
        $this->video = $video;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(?string $image): void {
        $this->image = $image;
    }

    public function getDocument(): ?string {
        return $this->document;
    }

    public function setDocument(?string $document): void {
        $this->document = $document;
    }

    public function getCategorie(): Categorie {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): void {
        $this->categorie = $categorie;
    }

    public function getEnseignant(): enseignant {
        return $this->enseignant;
    }

    public function setEnseignant(string $enseignant): void {
        $this->enseignant = $enseignant;
    }

    public function getDateCreation(): string {
        return $this->dateCreation;
    }

    public function setDateCreation(string $dateCreation): void {
        $this->dateCreation = $dateCreation;
    }
}
