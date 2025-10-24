<h1> Détail d'une mission</h1>

<h2>Détail de la mission dont l'id est : <?php echo $id; ?> </h2>



<?php echo $mission["mission_name"]."<br>";
echo $mission["category_mission_name"]."<br>";
echo $mission["mission_presentation"]."<br>";
echo $mission["mission_address"]."<br>";
echo $mission["city_name"]."<br>";
echo $mission["mission_starting_date"]."<br>";
echo $mission["mission_ending_date"]."<br>";
echo $mission["mission_number_max"]."<br>";

?>

<a href="index.php?page=mission&action=deleteMission&id=<?php echo $mission["id_mission"];?>"> Supprimez la mission</a>.<br>
<a href="index.php?page=mission&action=modifyMission&id=<?php echo $mission["id_mission"];?>"> Modifiez la mission</a>