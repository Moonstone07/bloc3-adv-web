
<?php
if ($species) {
    echo "<table border='2'>";
    echo "<tr><th>ID</th><th>Species Type</th><th>Actions</th></tr>";
    foreach ($species as $specie) {
        // echo "<>";
        echo "<td>" . $specie['pet_species_id'] . "</td>";
        echo "<td>" . $specie['pet_species_type'] . "</td>";
        echo "<td>";
        include 'updateSpeciesTypeForm.php';
        echo "</td>";
        echo "<td>";
        include 'deleteSpeciesTypeForm.php';
        echo "</td>";
        echo "<td>";
        include 'petForm.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No species data found.";
}
?> 
