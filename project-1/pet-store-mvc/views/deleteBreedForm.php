<form method='POST'>
    <input type='hidden' name='pet_breed_id' value='<?php echo $breed['pet_breed_id']; ?>'>

    <input type='hidden' name='delete_breed' value='<?php echo $breed['pet_breed_id']; ?>'>
    <input type='submit' name='delete_breed' id='delete_btn' value='Delete Breed'>
</form>