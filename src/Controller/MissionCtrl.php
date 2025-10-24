<?php

require_once 'src/Model/CategoryModel.php';
require_once 'src/Model/MissionModel.php';
require_once 'src/Model/CityModel.php';

class MissionCtrl
{
    public $msgError = null;
    public $msgSuccess = null;
    public $categoryModel; //j'ai créé cet attribut pr pouvoir instancié et appelé la classe
    public $missionModel;
    public $cityModel;
   


    public function __construct($db)

    {
        $this->categoryModel = new CategoryModel($db);//J'ai préparé un objet 
        $this->missionModel= new MissionModel($db);
        $this->cityModel= new CityModel($db);
    }


    //////////////////////Fonction manage/////////////////////////////////////////
    public function manage() {

        $action = filter_input(INPUT_GET, 'action');//filter_input va chercher dans l'url ce qu'il y a derrière action

        if ($action === 'showMissions') {
            $this->showMissions();
        } else if ($action === 'showOneMission') {
            $this->showOneMission();
        } else if ($action === 'addMission') {
            $this->addMission();
        }else if ($action === 'deleteMission') {
            $this->deleteMission();
        }else if ($action === 'modifyMission') {
            $this->modifyMission();
        }else if ($action === 'searchMission') {
            $this->searchMission();

        }
        else if ($action === 'storeMission') { 
            $this->storeMission();
            
        }
          else if ($action === 'storeUpdateMission') { 
            $this->storeUpdateMission();

          }
        else {
            $this->showMissions();
        }
    }


    // Méthode qui permet juste d'affichier le fomulaire
    public function addMission()
    {
   

        $mission=[
             "mission_name" => "",
            "category_mission_id" => "",
                "mission_presentation" => "",
                "mission_address" => "",
                "city_id" => "",
                "mission_starting_date" => "",
                 "mission_number_max" => "",
             "mission_ending_date" => ""
            ];
        $modificationMode=false;
        $categories = $this->categoryModel->getCategories();
        $cities=$this->cityModel->getCities();
        require_once "src/View/addMission.php";
    }







///////////////////////////////////////////////////////////////////////////////////////////////////////
  public function showMissions()
    {
        $missions=$this->missionModel->getAllMissions();
        require_once "src/View/showMissions.php";
     
    }

/////////////////////////////////////////////////////////////////////////////////////////////////

  public function showOneMission()
    {
        $id=$_GET["id"];
        $mission=$this->missionModel->getOneMission($id);
        require_once "src/View/showOneMission.php";
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////

  public function deleteMission()
    {
        
     $id=$_GET["id"];
     $mission=$this->missionModel->deleteMission($id);
     $msgSuccess="Mission supprimée";
     $missions=$this->missionModel->getAllMissions();

        require_once "src/View/showMissions.php";
     
    }

     /////////////////////////////////////////////////////////////////////////////////////////////////

  public function searchMission()
    {
        
     
    }


      /////////////////////////////////////////////////////////////////////////////////////////////////

  public function modifyMission()
    {
        $modificationMode=true;
        $id=$_GET["id"];
     $mission=$this->missionModel->getOneMission($id);
       $msgSuccess="Mission modifiée";
     $categories = $this->categoryModel->getCategories();
     $cities=$this->cityModel->getCities();
     require_once "src/View/addMission.php";
     
    }


     /////////////////////////////////////////////////////////////////////////////////////////////////

public function storeMission(){
   
    if (isset($_POST["mission_name"])){



        if (
            empty($_POST["mission_name"]) ||
            empty($_POST["category_mission_id"]) ||
            empty($_POST["mission_presentation"]) ||
            empty($_POST["mission_address"]) ||
            empty($_POST["city_id"]) ||
            empty($_POST["mission_starting_date"]) ||
            empty($_POST["mission_ending_date"]) ||
            empty($_POST["mission_number_max"])
        ) {

            $this->msgError = "Veuillez remplir tous les champs";
            // 🔁 On réaffiche le formulaire
            $categories = $this->categoryModel->getCategories();
            require_once "src/View/addMission.php";

        } else {

            // ✅ Insertion si tout est OK
            $this->missionModel->insertMission(
                $_POST["mission_name"],
                $_POST["category_mission_id"],
                $_POST["mission_presentation"],
                $_POST["mission_address"],
                $_POST["city_id"],
                $_POST["mission_starting_date"],
                $_POST["mission_ending_date"],
                $_POST["mission_number_max"]
            );

            // 🔁 Redirection vers showMissions
            header("Location:index.php?page=mission&action=showMissions");
            exit;
        }
    }
}
   
public function storeUpdateMission(){
   
    if (isset($_POST["mission_name"])){

          $id = $_GET["id"];

        if (
            empty($_POST["mission_name"]) ||
            empty($_POST["category_mission_id"]) ||
            empty($_POST["mission_presentation"]) ||
            empty($_POST["mission_address"]) ||
            empty($_POST["city_id"]) ||
            empty($_POST["mission_starting_date"]) ||
            empty($_POST["mission_ending_date"]) ||
            empty($_POST["mission_number_max"])
        ) {

            $this->msgError = "Veuillez remplir tous les champs";
            // 🔁 On réaffiche le formulaire
            $categories = $this->categoryModel->getCategories();
            require_once "src/View/addMission.php";

        } else {

              

            // ✅ Insertion si tout est OK
            $this->missionModel->updateMission(
                $id,
                $_POST["mission_name"],
                $_POST["category_mission_id"],
                $_POST["mission_presentation"],
                $_POST["mission_address"],
                $_POST["city_id"],
                $_POST["mission_starting_date"],
                $_POST["mission_ending_date"],
                $_POST["mission_number_max"]
            );

            // 🔁 Redirection vers showMissions
            header("Location:index.php?page=mission&action=showMissions");
            exit;
        }
    }
}
}