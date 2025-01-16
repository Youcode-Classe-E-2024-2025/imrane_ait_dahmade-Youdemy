<?php

require_once  "./config/configu.php";
require_once "./config/connection.php";
require_once "./entities/Role.php";
require_once "./controller/Authentification.php";
require_once "./model/UserModal.php";
require_once "./entities/User.php";
require_once "./controller/controllerCour.php";
require_once "./model/CourModal.php";
$register = new authentification(new UserModal);
$courRecherche = new CourContrller(new CourModal);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['register'])) {
        $RolePost = $_POST['Role'];
        $role = new Role($RolePost);
        $password = password_hash($_POST['Password2'], PASSWORD_DEFAULT);
        $user = new Utilisateur($_POST['Nom'], $_POST['Email'], $password, $role);


        if ($register->signup($user)) {
            header('Location: ./view/page_login.php');
        }
    }
  
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
   
    if(isset($_GET['mot_cle'])){
        $mot_cle = $_GET['mot_cle'];


        if (isset($_GET['mot_cle']) && !empty($_GET['mot_cle'])) {
    $mot_cle = $_GET['mot_cle'];
 $cours = $courRecherche->rechercheController($mot_cle);
    if($cours) {
        include_once __DIR__ ."/view/page_recherche.php";

        return $cours;
    } else {
        echo "Aucun résultat trouvé pour : " . htmlspecialchars($mot_cle);
    }
}
          

    }

}
