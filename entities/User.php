<?php
  
  class User{
        private $id;
        private $Nom;
        private $Email;
        private $Password;
        private $Activation;
        private $Role;

        public function __construct($id,$Nom,$Email,$Password,$Activation)
        {
            $this->id = $id;
            $this->Nom = $Nom;
            $this->Email = $Email;
            $this->Password = $Password;
            $this->Activation = $Activation;
        }



  }
?>