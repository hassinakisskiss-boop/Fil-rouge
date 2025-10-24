<h1> Liste des missions</h1>

<?php if (isset($msgSuccess) and !empty($msgSuccess)): ?>
    <div style="color: green; font-weight: bold;">
        <?= $msgSuccess ?>
    </div>
<?php endif; ?>


<a href="index.php?page=mission&action=addMission"> Créer une mission </a>


<!--Je viens ici avec $missions

<?php foreach ($missions as $mission) : 
 echo $mission["mission_name"];

 endforeach;?>-->

<table>
<tr>
    <th>Nom de la mission</th>
    <th>Catégorie de la mission</th>
    <th>Présentation de la mission </th>
    <th>Adresse</th>
    <th>Ville</th>
    <th>Date de début</th>
    <th>Date de fin</th>
    <th>Nombre de bénévole<th>
</tr>

    <?php foreach ($missions as $miss):?>
<tr>
<td>
<?php echo $miss["mission_name"];?>
</td>

<td>
<?php echo $miss["category_mission_name"];?>
</td>


<td>
<?php echo $miss["mission_presentation"];?>
</td>

<td>
<?php echo $miss["mission_address"];?>
</td>

<td>
<?php echo $miss["city_name"];?>
</td>

<td>
<?php echo $miss["mission_starting_date"];?>
</td>


<td>
<?php echo $miss["mission_ending_date"];?>
</td>

<td>
<?php echo $miss["mission_number_max"];?>
</td>

<td>
<a href="index.php?page=mission&action=showOneMission&id=<?php echo $miss["id_mission"];?>"> Voir la mission</a>
</td>

</tr>
<?php endforeach;?>


</table>