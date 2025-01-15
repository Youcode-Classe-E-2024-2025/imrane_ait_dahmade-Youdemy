<?php

class Cour {
    private int $idCour;
    private string $nomCour;
    private string $description;
    private string $video;
    private string $image;
    private string $document;
    private Categorie $categorie;
    private \DateTime $dateCreation;
    private Utilisateur $enseignant;

    public function __construct(
        int $idCour,
        string $nomCour,
        string $description,
        string $video,
        string $image,
        string $document,
        Categorie $categorie,
        Utilisateur $enseignant
    ) {
        $this->idCour = $idCour;
        $this->nomCour = $nomCour;
        $this->description = $description;
        $this->video = $video;
        $this->image = $image;
        $this->document = $document;
        $this->categorie = $categorie;
        $this->dateCreation = new \DateTime();
        $this->enseignant = $enseignant;
    }

    public function getNomCour(): string {
        return $this->nomCour;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getVideo(): string {
        return $this->video;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getDocument(): string {
        return $this->document;
    }

    public function getCategorie(): Categorie {
        return $this->categorie;
    }

    public function getDateCreation(): \DateTime {
        return $this->dateCreation;
    }

    public function getEnseignant(): Utilisateur {
        return $this->enseignant;
    }
}
