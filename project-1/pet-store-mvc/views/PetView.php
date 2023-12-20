<!-- <?php
if ($pets) {
    foreach ($pets as $pet) {
        echo $pet['pet_ID'] . " " . $pet['pet_Name'] . " " . $pet['pet_Gender'] . " " . $pet['pet_Age'] . " " . $pet['pet_Color'] . "</br>";
    }
} else {
    echo "no data found";
}
?> -->
<?php

echo "<ul class='pet-list'>";
foreach ($pets as $pet) {
    echo "<li>";
    echo "Name: " . $pet['pet_Name'] . ", ";
    echo "Gender: " . $pet['pet_Gender'] . ", ";
    echo "Age: " . $pet['pet_Age'] . ", ";
    echo "Color: " . $pet['pet_Color'];
    echo "</li>";
}
echo "</ul>";
?>