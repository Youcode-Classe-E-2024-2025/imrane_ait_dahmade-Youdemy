<?php
    class Tag{
        private $NomTag;

        public function __construct($NomTag)
        {
            $this->NomTag = $NomTag;
        }
        public function GetTag(){
                return $this->NomTag ;

        }
    }


?>