<section class="wrapper">

    <h3>Add a breed</h3>
    <form method="POST">
        <label for="name">breed:</label>
        <input type="text" id="name" name="name" required">

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>


    <h3>Add a species</h3>
    <form method="POST">
        <label for="name">Species:</label>
        <input type="text" id="name" name="name" required">

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>

    <h3>Add a toy</h3>
    <form method="POST">
        <label for="name">Toy:</label>
        <input type="text" id="name" name="name" required">
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required">

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>


    <h3>Add a pet</h3>
    <form method="POST">
        <label for="name">name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">age:</label>
        <input type="text" id="age" name="age" required>

        <label for="gender">gender:</label>
        <input type="text" id="gender" name="gender" required>

        <label for="color">color:</label>
        <input type="text" id="color" name="color" required>

        <label for="breed_id">breed:</label>
        <select name="breed_id">
            <?php foreach ($breeds as $breed) : ?>
                <option value="<?= $breed['pet_breed_id'] ?>"><?= $breed['pet_breed_name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="species_id">species:</label>
        <select name="species_id">
            <?php foreach ($species as $specie) : ?>
                <option value="<?= $specie['pet_species_id'] ?>"><?= $specie['pet_species_type'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
</section>