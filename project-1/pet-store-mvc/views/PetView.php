<?php
if ($pet) {
    foreach ($pet as $pets) {
        echo $pets['pet_ID'] . " " . $pet['pet_Name'] . " " . $pet['pet_Gender'] . " " . $pet['pet_Age'] . " " . $pet['pet_Color'] . "</br>";
    }
} else {
    echo "no data found";
}
?>