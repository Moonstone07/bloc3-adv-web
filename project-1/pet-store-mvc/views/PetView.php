   <?php
    if ($pets) {
        echo "<table border='1'>";
        echo "<tr>
        <th>ID</th>
        <th>name</th>
        <th>age</th>
        <th>color</th>
        <th>breed</th>
        <th>species</th>

    </tr>";
        foreach ($pets as $pet) {
            echo "<td>" . $pet['pet_id'] . "</td>";
            echo "<td>" . $pet['pet_name'] . "</td>";
            echo "<td>" . $pet['pet_age'] . "</td>";
            echo "<td>" . $pet['pet_color'] . "</td>";
            echo "<td>" . $pet['breed_id'] . "</td>";
            echo "<td>" . $pet['species_id'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No pet data found.";
    }


    if ($species) {

        echo "<table border='1'>";
        echo "<tr>
        <th>ID</th>
        <th>Species Type</th>
        <th>Update</th>

    </tr>";
        foreach ($species as $specie) {
            echo "<td>" . $specie['pet_species_id'] . "</td>";
            echo "<td>" . $specie['pet_species_type'] . "</td>";
            echo "<td>";
            include 'views/updateSpeciesTypeForm.php';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No species data found.";
    }

    if ($breeds) {

        echo "<table border='1'>";
        echo "<tr>
        <th>ID</th>
        <th>Breed Type</th>
        <th>Update</th>
    </tr>";
        foreach ($breeds as $breed) {
            echo "<td>" . $breed['pet_breed_id'] . "</td>";
            echo "<td>" . $breed['pet_breed_name'] . "</td>";
            echo "<td>";
            include 'views/updateBreedForm.php';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No breed data found.";
    }


    if ($toys) {
        echo "<table>";
        echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Update</th>
        </tr>";

        foreach ($toys as $toy) {
            echo "<tr>";
            echo "<td>" . $toy['pet_toy_id'] . "</td>";
            echo "<td>" . $toy['pet_toy_name'] . "</td>";
            echo "<td>" . $toy['pet_toy_price'] . "</td>";
            echo "<td>";
            include 'views/updateToyForm.php';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No toys found.";
    }

?>