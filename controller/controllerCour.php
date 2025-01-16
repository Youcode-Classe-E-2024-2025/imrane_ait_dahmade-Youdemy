<?php
    
class CourContrller
{

    private CourModal $CourModal;

    public function __construct(CourModal $CourModal)
    {
        $this->CourModal = $CourModal;
    }

    public function AffichageCours()
    {
        $Cours = $this->CourModal->affichagesCours();
        return $Cours;
    }
    public function AffichageCoursWithPagination()
    {
        $elementParPage = 4;


        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $Offest = ($page - 1) * $elementParPage;
        $Cours = $this->CourModal->affichagesCoursWithPagination($elementParPage, $Offest);
        $totalCours = $this->CourModal->GetTotalCour();
        $totalPages = ceil($totalCours/$elementParPage);
        return [$Cours,$totalPages,$page];

    }
    public function rechercheController($motcle){
     
        $totalCours = $this->CourModal->GetTotalCour();
       
        $elementParPage = 4;
        $totalPages = ceil($totalCours/$elementParPage);
        
        if($motcle){
           
            $Cours = $this->CourModal->rechercheCour($motcle); 
            return $Cours;
        }
        else{
            
            echo "echo";


        }
       
    }
}
