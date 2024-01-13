<form method='POST'>
    <input type='hidden' name='pet_species_id' value='<?php echo $specie['pet_species_id']; ?>'>
    
    <input type='hidden' name='delete_species' value='<?php echo $specie['pet_species_id']; ?>'>
    <input type='submit' name='delete_species' value='Delete Specie'> 
</form>