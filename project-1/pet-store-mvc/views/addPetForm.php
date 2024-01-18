<section class="wrapper">

    <h3>Add a pet</h3>
    <form method="POST" action="?action=addPet">
        <label for="name">name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">age:</label>
        <input type="text" id="age" name="age" required>

        <label for="gender">gender:</label>
        <input type="text" id="gender" name="gender" required>

        <label for="color">color:</label>
        <input type="text" id="color" name="color" required>

        <label for="pet_breed_name">breed:</label>
        <select name="pet_breed_id">
            <?php foreach ($breeds as $breed) : ?>
                <option value="<?= $breed['pet_breed_id'] ?>"><?= $breed['pet_breed_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="pet_species_type">species:</label>
        <select name="pet_species_id">
            <?php foreach ($species as $specie) : ?>
                <option value="<?= $specie['pet_species_id'] ?>"><?= $specie['pet_species_type'] ?></option>
            <?php endforeach; ?>
        </select>


        <input type="submit" name="submit_pet" value="Submit">
    </form>
</section>