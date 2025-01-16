<?php

class authentification{
    private UserModal $userModal;

public function __construct(UserModal $userModal)
{
    $this->userModal = $userModal;
}
    public function signup(Utilisateur $user){
        $modal = new UserModal;
        return  $modal->AjouterUser($user);
        
    }
    public function login($email,$password){

        session_start();
try{
        if(empty($email) && empty($password)){
            echo "false";
        }

        $user = $this->userModal->login($email,$password);
    
        if($user){
            $_SESSION['NomUser'] = $user->getNom();
            $_SESSION['TypeUser'] = $user->getRole();

            echo "Login successful! Welcome, " . $user->getNom();
            
            if ($user->getRole() === 'Enseignant') {
                header('Location: ./view/Enseignant.php?name=' . $user->getNom());
                exit();
            } elseif($user->getRole() === 'Administrateur') {
                header('Location: ./view/page_employe.php?name=' . $user->getNom());
                exit();
            }
            


        }

    }catch(Exception $e){
        echo "An error occurred: " . $e->getMessage();
    }
    }


}


?>