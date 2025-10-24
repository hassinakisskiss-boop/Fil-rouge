


<h1>
    Rajoutez une mission
</h1>

<?php if (!empty($this->msgError)): ?>
    <div style="color: red; font-weight: bold;">
        <?= $this->msgError; ?>
    </div>
    <?php endif;?>



<form method="POST" enctype="multipart/form-data" action="index.php?page=mission&action=
<?php if($modificationMode==false) {
    echo "storeMission";
}else{
echo "storeUpdateMission&id={$mission['id_mission']}";
}

?>">



   
    <div>
        <label for="mission_name">Nom de la mission</label>

        <input type="text" id="mission_name" name="mission_name" value="<?php echo $mission["mission_name"];?>">
    </div>

    <div>
        <label for="category_mission_id">Type de mission </label>

        <select id="category_mission_id" name="category_mission_id">

            <option value="">
                Sélectionnez le type de mission
            </option>

            

          <?php foreach ($categories as $cat): ?>
    <option value="<?php echo $cat['id_category_mission']; ?>"
     <?php if ($mission['category_mission_id'] == $cat['id_category_mission'])
        {echo 'selected';} ?> >

        <?= $cat['category_mission_name']; ?>
    </option>
<?php endforeach; ?>


            

           
        </select>
    </div>

    <div>
        <label for="mission_presentation">
            Présentation de la mission
        </label>

        <textarea id="mission_presentation" name="mission_presentation" rows="20"  required>
            <?php echo $mission["mission_presentation"];?>
        </textarea>
    </div>

    <div>
        <label for="mission_address">Adresse de la mission</label>
        <input type="text" value="<?php echo $mission["mission_address"];?>" id="mission_address" name="mission_address" required>
    </div>


    <div>
        <label for="city_id">Ville</label>

        <select id ="city_id" name="city_id">

        <option >Sélectionnez la ville</option>
           
          <?php foreach ($cities as $city): ?>
    <option value="<?php echo $city['id_city']; ?>"
     <?php if ($mission['city_id'] == $city['id_city'])
        {echo 'selected';} ?> >

        <?= $city['city_name']; ?>
    </option>
<?php endforeach; ?>

        </select>
      
          </div>



    <div>
        <label for="mission_starting_date"> Date de début </label>
        <input type="date" id="mission_starting_date" name="mission_starting_date" value="<?php echo $mission["mission_starting_date"];?>" required>
    </div>

    <div>
        <label for="mission_ending_date"> Date de fin </label>
        <input type="date" id="mission_ending_date" name="mission_ending_date" required value="<?php echo $mission["mission_ending_date"];?>">
    </div>

    <div>
        <label for="mission_number_max">Nombre de bénévoles requis</label>
        <input type="number" required id="mission_number_max" name="mission_number_max" value="<?php echo $mission["mission_number_max"];?>">
    </div>



    <div>

        <label for="mission_photo">Photo de la mission</label>
        <input type="file" name="mission_photo" id="mission_photo">

    </div>

    <div>
        <button type="submit">
            Envoyer
        </button>
    </div>

</form>