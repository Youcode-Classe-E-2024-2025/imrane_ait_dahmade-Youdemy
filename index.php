<?php

require_once  "./config/configu.php";
require_once "./config/connection.php";
require_once "./entities/Role.php";
require_once "./controller/Authentification.php";
require_once "./model/UserModal.php";
require_once "./entities/User.php";
$register = new authentification(new UserModal);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['register'])) {
        $RolePost = $_POST['Role'];
        $role = new Role($RolePost);
        $password = password_hash($_POST['Password2'],PASSWORD_DEFAULT);
        $user = new Utilisateur($_POST['Nom'], $_POST['Email'], $password, $role);
      

        if ($register->signup($user)) {
            header('Location: ./view/page_login.php');
        }
    }
}
