<?php

require_once 'src/Model/CategoryModel.php';

class CategoryCtrl
{
    private $categoryModel;

    public function __construct($db)
    {
        // On transmet la connexion au modèle
        $this->categoryModel = new CategoryModel($db);//je crée un objet CategroyModel que je stock dans $this->categoryModel
                                                     //C'est comme si je prépare un tableau vide
    }




    // Méthode simple pour fournir des catégories à une autre vue
    public function getCategories()
    {
        return $this->categoryModel->getCategories();

     
    }
}