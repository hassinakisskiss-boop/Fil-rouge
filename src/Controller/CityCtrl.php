<?php

require_once 'src/Model/CityModel.php';

class CityCtrl
{
    private $cityModel;

    public function __construct($db)
    {
        // On transmet la connexion au modèle
        $this->cityModel = new CityModel($db);//je crée un objet cityModel que je stock dans $this->cityModel
                                                     //C'est comme si je prépare un tableau vide
    }




    // Méthode simple pour fournir des catégories à une autre vue
    public function getCities()
    {
        return $this->cityModel->getCities();

     
    }
}