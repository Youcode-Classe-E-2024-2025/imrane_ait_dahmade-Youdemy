CREATE DATABASE Youdemy;

USE Youdemy;


CREATE TABLE Utilisateur (
    Id int PRIMARY KEY AUTO_INCREMENT UNIQUE,
    Nom VARCHAR(15) NOT NULL,
    Email VARCHAR(20) UNIQUE NOT NULL,
    PASSWORD VARCHAR(255) NOT NULL,
    Role ENUM('Etudiant','Enseignant','Administrateur') DEFAULT 'Etudiant',
    DateCreation DATETIME DEFAULT now()

);

INSERT INTO Utilisateur (Nom, Email, PASSWORD, Role) 
VALUES 
    ('Alice', 'alice@example.com', 'password123', 'Etudiant'),
    ('Bob', 'bob@example.com', 'password456', 'Enseignant');

    CREATE View Etudiant AS
    SELECT Id,Nom,Email,PASSWORD,DateCreation FROM Utilisateur WHERE Role = 'Etudiant';

    INSERT INTO Utilisateur (Nom, Email, PASSWORD, Role) 
VALUES 
    ('ana', 'ana@example.com', 'password123', 'Etudiant');

    CREATE View Enseignant As 
    SELECT  Id,Nom,Email,PASSWORD,DateCreation  FROM utilisateur WHERE Role ='Enseignant';

    
   CREATE View Administrateur As 
    SELECT  Id,Nom,Email,PASSWORD,DateCreation  FROM utilisateur WHERE Role ='Administrateur';

    CREATE Table Cour (
        IdCour int PRIMARY KEY AUTO_INCREMENT UNIQUE ,
        NomCour VARCHAR(20) NOT NULL ,
        Description TEXT not NULL ,
        Video VARCHAR(255),
        image VARCHAR(255),
        document VARCHAR(255),
        Categorie VARCHAR(255),
        Foreign Key (Categorie) REFERENCES Categorie(NomCategorie),
        DateCreation DATETIME DEFAULT now()
    );
    CREATE Table Categorie(
        NOmCategorie VARCHAR(255) UNIQUE not NULL
    );
    ALTER Table Categorie 
    ADD  PRIMARY KEY(NomCategorie) ;

    ALTER Table Cour 
    ADD COLUMN Enseignant int ,
    Foreign Key (Enseignant) REFERENCES Utilisateur(Id);

    CREATE Table Tag (
        NomTag VARCHAR(10) NOT NULL UNIQUE
    )

