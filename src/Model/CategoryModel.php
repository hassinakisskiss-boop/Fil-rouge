<?php




class CategoryModel
{

    private $db; //J'auraismis $db1, ça aurait été pareil. C'est pas ici que je récupère la connexion 

    public function __construct($db) //Avec construct je récupère la connexion et je profite pour dire que $this->db portera la connexion
    {
        $this->db= $db;
    }

   public function getCategories() {

    try {

       

        $request    = $this->db->query('SELECT * FROM category_mission ');
        $result     = $request->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    } catch (PDOException $e) {

        var_dump('Erreur SQL : ' . $e->getMessage());
    }
}

}