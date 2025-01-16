<?php
require_once __DIR__ . "/../config/configu.php";
require_once __DIR__ . "/../config/connection.php";

class CourModal {

    private PDO $conn;
    
    public function __construct()
    {
        $this->conn = DatabaseConnection::getInstance()->getConnection(); 
    }

    public function affichagesCours(){
        $requet = "SELECT * FROM Cour LIMIT 4  ";
        $stmt = $this->conn->prepare($requet);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);       
    }
    public function affichagesCoursWithPagination($Limit ,$Offset){
        $requet = "SELECT * FROM Cour LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($requet);
        $stmt->bindParam(':limit',$Limit,PDO::PARAM_INT);
        $stmt->bindParam(':offset',$Offset,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);       
    }

    public function GetTotalCour(){
        $requet =" SELECT count(*) from Cour";
        $stmt = $this->conn->prepare($requet);
        $stmt->execute();
       return $stmt->fetchColumn();
    }
    public function rechercheCour($mot_cle) {       
        $requet = "SELECT * FROM Cour WHERE NomCour LIKE :MOTCLE OR Categorie = :MOTCLE";
        $stmt = $this->conn->prepare($requet);
        $stmt->bindParam(':MOTCLE', $mot_cle, PDO::PARAM_STR);
        $stmt->execute();   
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retourne les résultats sous forme de tableau associatif.
    }
    
    
}

?>