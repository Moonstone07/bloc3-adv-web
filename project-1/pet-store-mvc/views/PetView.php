<form action = "">

<select name = "" id="">
    <option value = "">select a pet</option>

<?php
    if($pets){
        foreach($pets as $pet){
            echo "<option value=" .  $pet['ID'] . ">" . $pet['name'] . "</option>";
        }
    }else{
        echo "<option value = ''>No pets found</option>";
    }
?>

</select>

</form>