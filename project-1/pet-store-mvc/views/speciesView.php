<?php

if ($species) {

    echo "<table border='1'>";
    echo "<tr>
        <th>ID</th>
        <th>Species Type</th>
        <th>Update</th>
        <th>Delete</th>


    </tr>";
    foreach ($species as $specie) {
        echo "<td>" . $specie['pet_species_id'] . "</td>";
        echo "<td>" . $specie['pet_species_type'] . "</td>";
        echo "<td>";
        include 'views/updateSpeciesTypeForm.php';
        echo "</td>";
        echo "<td>";
        include 'views/deleteSpeciesTypeForm.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No species data found.";
}

?>