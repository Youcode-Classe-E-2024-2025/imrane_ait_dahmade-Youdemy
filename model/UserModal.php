<?php 
    class UserModal {

        private PDO $conn;
        public function __construct()
        {
            $this->conn = DatabaseConnection::getInstance()->getConnection();
        }
        public function AjouterUser(Utilisateur $utilisateur){
                $requet = "INSERT INTO Utilisateur (Nom,Email,PASSWORD,Role) VALUES (:NOM,:EMAIL,:PASSWORD,:ROLE)";
                $stmt =$this->conn->prepare($requet);
                $nom = $utilisateur->getNom();
                $Email = $utilisateur->getEmail();
                $password = $utilisateur->getPassword();
                $role = $utilisateur->getRole();
               return $stmt->execute([
                    ':NOM' => $nom,
                    ':EMAIL' => $Email,
                    ':PASSWORD' => $password,
                    ':ROLE' => $role
               ]);
        }


    }


?>