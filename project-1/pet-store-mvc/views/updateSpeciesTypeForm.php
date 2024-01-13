<form method='POST'>
    <input type='hidden' name='pet_species_id' value='<?php echo $specie['pet_species_id']; ?>'>



    <label for='new_species_name'>New Species Name:</label>
    <input type='text' name='new_species_name' placeholder='New Species Name'>
    <input type='submit'name='update_species' value='Update Specie'>


    <input type='hidden' name='delete_species' value='<?php echo $specie['pet_species_id']; ?>'>
    <input type='submit' name='delete_species' value='Delete Specie'> 
</form>