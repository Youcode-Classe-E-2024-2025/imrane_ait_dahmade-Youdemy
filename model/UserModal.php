<?php
class UserModal
{

    private PDO $conn;
    public function __construct()
    {
        $this->conn = DatabaseConnection::getInstance()->getConnection();
    }
    public function AjouterUser(Utilisateur $utilisateur)
    {
        $requet = "INSERT INTO Utilisateur (Nom,Email,PASSWORD,Role) VALUES (:NOM,:EMAIL,:PASSWORD,:ROLE)";

        $stmt = $this->conn->prepare($requet);
        $nom = $utilisateur->getNom();
        $Email = $utilisateur->getEmail();
        $password = $utilisateur->getPassword();
        $role = $utilisateur->getRole()->getRole();

        return $stmt->execute([
            ':NOM' => $nom,
            ':EMAIL' => $Email,
            ':PASSWORD' => $password,
            ':ROLE' => $role
        ]);
    }
    public function login($Email, $password)
    {
        $requet = "SELECT * FROM Utilisateur where Email = :email and StatuInscription = :activer";
        $stmt = $this->conn->prepare($requet);
        $stmt->bindParam(':email', $Email, PDO::PARAM_STR);
        $stmt->bindParam(':activer', $active, PDO::PARAM_STR);
        $user =  $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['PASSWORD'])) {
            return new Utilisateur(
                $user['Nom'],
                $user['Email'],
                $user['PASSWORD'],
                $user['Etudiant']
            );
        } else {
            echo "un probleme";
        }
    }
}
