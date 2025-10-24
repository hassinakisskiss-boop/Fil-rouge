<?php

class MissionModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertMission(
        $mission_name,
        $category_mission_id,
        $mission_presentation,
        $mission_address,
        $city_id,
        $mission_starting_date,
        $mission_ending_date,
        $mission_number_max
    ) {

        try {
            // ✅ Requête d'insertion
            $request = $this->db->prepare("INSERT INTO mission (
                mission_name,
                category_mission_id,
                mission_presentation,
                mission_address,
                city_id,
                mission_starting_date,
                mission_ending_date,
                mission_number_max
            ) VALUES (?,?,?,?,?,?,?,?)");

            $request->execute([
                $mission_name,
                $category_mission_id,
                $mission_presentation,
                $mission_address,
                $city_id,
                $mission_starting_date,
                $mission_ending_date,
                $mission_number_max
            ]);
        } catch (PDOException $e) {
            //  Arrête tout et affiche l'erreur SQL clairement
            return "❌ Erreur SQL : " . $e->getMessage();
        }
    }


    public function getAllMissions()

    {

        try {

            $request = $this->db->query("SELECT * 
                                        FROM mission
                                        JOIN city ON mission.city_id = city.id_city
                                        JOIN category_mission ON mission.category_mission_id = category_mission.id_category_mission");

            $result = $request->fetchAll(PDO::FETCH_ASSOC);



            return $result;
        } catch (PDOException $e) {
            var_dump('Echec connexion DDB' . $e->getMessage());
        }
    }


    public function getOneMission($id)

    {

        try {

            $request = $this->db->prepare('SELECT * FROM mission
             JOIN city ON mission.city_id = city.id_city
             JOIN category_mission ON mission.category_mission_id = category_mission.id_category_mission
             where id_mission=?');

            $request->execute([$id]);
            $result = $request->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            var_dump('Echec connexion DDB' . $e->getMessage());
        }
    }

    public function deleteMission($id)
    {

        try {
            $request = $this->db->prepare("delete FROM mission where id_mission=?");
            $request->execute([$id]);
        } catch (PDOException $e) {
            var_dump('Echec connexion DDB' . $e->getMessage());
        }
    }


    public  function updateMission(
        $id,
        $mission_name,
        $category_mission_id,
        $mission_presentation,
        $mission_address,
        $city_id,
        $mission_starting_date,
        $mission_ending_date,
        $mission_number_max
    ) {

        try {
            // ✅ Requête d'insertion
            $request = $this->db->prepare("UPDATE mission set 
                mission_name=?,
                category_mission_id=?,
                mission_presentation=?,
                mission_address=?,
                city_id=?,
                mission_starting_date=?,
                mission_ending_date=?,
                mission_number_max=?
            where id_mission= ?");

            $request->execute([
                $mission_name,
                $category_mission_id,
                $mission_presentation,
                $mission_address,
                $city_id,
                $mission_starting_date,
                $mission_ending_date,
                $mission_number_max,
                $id
            ]);
        } catch (PDOException $e) {
            //  Arrête tout et affiche l'erreur SQL clairement
            return "❌ Erreur SQL : " . $e->getMessage();
        }
    }
}
