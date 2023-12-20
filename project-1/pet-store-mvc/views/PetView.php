<?php
if ($pets) {
    foreach ($pets as $pet) {
        echo $pet['pet_ID'] . " " . $pet['pet_Name'] . " " . $pet['pet_Gender'] . " " . $pet['pet_Age'] . " " . $pet['pet_Color'] . "</br>";
    }
} else {
    echo "no data found";
}
?>