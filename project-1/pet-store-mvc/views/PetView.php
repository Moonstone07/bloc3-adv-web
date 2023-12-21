 <?php
if ($species) {
    foreach ($species as $specie) {
        echo $specie ['pet_species_type'] . "</br>";
    }
} else {
    // echo "no data found";
}
?> 
