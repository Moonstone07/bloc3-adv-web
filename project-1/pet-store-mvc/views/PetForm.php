<h2>Add a specie</h2>
<form method="POST">
    <label for="name">pet specie:</label>
    <input type="text" id="type" name="type" required">


    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">
</form>



<h2>Add a Pet</h2>
<form method="POST">
    <label for="name">name:</label>
    <input type="text" id="name" name="name" required">


    <label for="age">age:</label>
    <input type="text" id="age" name="age" required">

    <label for="gender">gender:</label>
    <input type="text" id="gender" name="gender" required">


    <label for="color">color:</label>
    <input type="text" id="color" name="color" required">

    <label for="breed_id">breed:</label>

    <select name="breed_id" id="breed_id">
        <?php foreach ($breeds as $breed) : ?>
            <option value="<?php echo $breed['pet_breed_id']; ?>"><?php echo $breed['pet_breed_name']; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="species_id">species:</label>

    <select name="species_id" id="species_id">
        <?php foreach ($species as $specie) : ?>
            <option value="<?php echo $specie['pet_species_id']; ?>"><?php echo $specie['pet_species_type']; ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">
</form>