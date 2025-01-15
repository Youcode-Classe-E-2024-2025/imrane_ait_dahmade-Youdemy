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


}


?>