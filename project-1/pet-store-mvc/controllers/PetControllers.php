<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{
    // menu links
    public function menu() {
        include "views/petMenuLinks.php";
    }


    //  MODEL INSTANCES
    private $PetModel;
    private $SpeciesModel;
    private $BreedModel;
    private $ToyModel;

    public function __construct($conn)
    {
        $this->PetModel = new PetModel($conn);
        $this->SpeciesModel = new SpeciesModel($conn);
        $this->BreedModel = new BreedModel($conn);
        $this->ToyModel = new ToyModel($conn);
    }

    //  SPECIES TABLE MODEL

    public function displaySpecies()
    {
        // Get all species from the database
        $species = $this->SpeciesModel->getAllSpecies();
        // var_dump($species);
        // Include the view file
        include "views/speciesView.php";
    }

    public function addSpeciesType()
    {
        // Check if the POST request contains a 'name' field and it's not empty
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            echo "Please enter a species name.";
        } else {
            // If it does, get the species name from the POST request
            $species_name = $_POST['name'];
            // Use the SpeciesModel to insert the new species into the database
            $this->SpeciesModel->insertSpecies($species_name);
            echo "Species added successfully: $species_name";
        }
    }

    public function updateSpeciesName($id, $new_species_name)
    {
        // Use the SpeciesModel to update the species in the database
        // The $id parameter is the ID of the species to update
        // The $new_species_name parameter is the new name for the species
        return $this->SpeciesModel->updateSpecies($id, $new_species_name);
        include "views/updateSpeciesTypeForm.php";
    }

    public function deleteSpeciesType()
    {
        // Check if the POST request contains a 'pet_species_id' field
        if (isset($_POST['pet_species_id'])) {
            // If it does, get the species ID from the POST request
            $species_id = $_POST['pet_species_id'];
            // Use the SpeciesModel to delete the species from the database
            $result = $this->SpeciesModel->deleteSpecies($species_id);
            if ($result) {
                echo "Species deleted successfully: $species_id";
            } else {
                echo "Error deleting species: $species_id";
            }
        } else {
            echo "No species ID provided.";
        }
    }

    //  BREED TABLE MODEL

    public function displayBreeds()
    {
        // Get all breeds from the database
        $breeds = $this->BreedModel->getAllBreeds();
        // var_dump($breeds);
        // Include the view file
        include "views/breedView.php";
    }

    public function addBreedType()
    {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            echo "Please enter a breed name.";
        } else {
            $breed_name = $_POST['name'];
            $this->BreedModel->insertBreed($breed_name);
            echo "Breed added successfully: $breed_name";
        }
    }

    public function updateBreedName($id, $new_breed_name)
    {
        return $this->BreedModel->updateBreed($id, $new_breed_name);
    }

    public function deleteBreedType()
    {
        if (isset($_POST['pet_breed_id'])) {
            $breed_id = $_POST['pet_breed_id'];
            $result = $this->BreedModel->deleteBreed($breed_id);
            if ($result) {
                echo "Breed deleted successfully: $breed_id";
            } else {
                echo "Error deleting breed: $breed_id";
            }
        } else {
            echo "No breed ID provided.";
        }
    }

    //  PET TABLE VIEW
    // display all pets

    public function displayPets()
    {
        // var_dump($breeds);
        // var_dump($species);

        // Get all pets from the database
        $pets = $this->PetModel->getAllPets();
        // Include the view file
        include "views/petView.php";
    }

    public function displayAddPetForm()
    {
        $species = $this->SpeciesModel->getAllSpecies();
        $breeds = $this->BreedModel->getAllBreeds();
        include "views/addPetForm.php";
    }

    // add a pet
    public function addPet()
    {
        // var_dump($_POST);

        // var_dump(isset($_POST['name']));
        // var_dump(isset($_POST['gender']));
        // var_dump(isset($_POST['age']));
        // var_dump(isset($_POST['color']));
        // var_dump(isset($_POST['breed_id']));
        // var_dump(isset($_POST['species_id']));

        if (isset($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['color'], $_POST['breed_id'], $_POST['species_id'])) {
            $pet_name = $_POST['name'];
            $pet_gender = $_POST['gender'];
            $pet_age = $_POST['age'];
            $pet_color = $_POST['color'];
            $breed_id = $_POST['breed_id'];
            $species_id = $_POST['species_id'];
            $result = $this->PetModel->insertPet($pet_name, $pet_gender, $pet_age, $pet_color, $breed_id, $species_id);
            if ($result) {
                echo "Pet added successfully $pet_name, $pet_gender, $pet_age, $pet_color, $breed_id, $species_id";
            } else {
                echo "Error adding pet";
            }
        } else {
            echo "All fields are required.";
        }
    }

    //  TOY TABLE MODEL

    public function displayToys()
    {
        // Get all toys from the database
        $toys = $this->ToyModel->getToys();
        // Include the view file
        include "views/toyView.php";
    }

    public function addToyType()
    {
        if (isset($_POST['name']) && isset($_POST['price'])) {
            $toy_name = $_POST['name'];
            $toy_price = $_POST['price'];
            $this->ToyModel->insertToy($toy_name, $toy_price);
            echo "Toy added successfully: $toy_name, $toy_price";
        } else {
            echo "Toy name or price not provided.";
        }
    }
    public function getToys()
    {
        return $this->ToyModel->getToys();
    }

    public function updateToyName($id, $new_toy_name)
    {
        return $this->ToyModel->updateToy($id, $new_toy_name);
    }

    public function deleteToyType()
    {
        if (isset($_POST['pet_toy_id'])) {
            $toy_id = $_POST['pet_toy_id'];
            $result = $this->ToyModel->deleteToy($toy_id);
            if ($result) {
                echo "Toy deleted successfully: $toy_id";
            } else {
                echo "Error deleting toy: $toy_id";
            }
        } else {
            echo "No toy ID provided.";
        }
    }

}


include_once 'controllers/config.php';
$connect2DA = new ConnectionDA(
    $host,
    $username,
    $password,
    $dbname
);

$controller = new PetController($connect2DA);

//  MENU LINKS
$controller->menu();



// controller for species table
if (isset($_POST['submit_species'])) {
    $controller->addSpeciesType();
} else if (isset($_POST['delete_species'])) {
    $controller->deleteSpeciesType();
} else if (isset($_POST['update_species'])) {
    $controller->updateSpeciesName( $_POST['pet_species_id'], $_POST['new_species_name']);
}

// SPECIES PAGE
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'species') {
        $controller->displaySpecies();
    } else if ($_GET['page'] == 'addSpeciesType') {
        include "views/addSpeciesForm.php";
    } elseif ($_GET['page'] == 'updateSpecies') {
        include "views/updateSpeciesTypeForm.php";
    } elseif ($_GET['page'] == 'deleteSpecies') {
        include "views/deleteSpeciesTypeForm.php";
    }
}


// controller for breed table
if (isset($_POST['submit_breed'])) {
    $controller->addBreedType();
} else if (isset($_POST['delete_breed'])) {
    $controller->deleteBreedType();
} else if (isset($_POST['update_breed'])) {
    $controller->updateBreedName($_POST['pet_breed_id'], $_POST['new_breed_name']);
}

// BREED PAGE
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'breeds') {
        $controller->displayBreeds();
    } else if ($_GET['page'] == 'addBreedType') {
        include "views/addBreedForm.php";
    } elseif ($_GET['page'] == 'updateBreed') {
        include "views/updateBreedForm.php";
    } elseif ($_GET['page'] == 'deleteBreed') {
        include "views/deleteBreedForm.php";
    }
}


// controller for toy table
if (isset($_POST['submit_toy'])) {
    $controller->addToyType();
} else if (isset($_POST['delete_toy'])) {
    $controller->deleteToyType();
} else if (isset($_POST['update_toy'])) {
    $controller->updateToyName($_POST['pet_toy_id'], $_POST['new_toy_name']);
}

// TOY PAGE
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'Toys') {
        $controller->displayToys();
    } else if ($_GET['page'] == 'addToy') {
        include "views/addToyForm.php";
    } elseif ($_GET['page'] == 'updateToy') {
        include "views/updateToyForm.php";
    } elseif ($_GET['page'] == 'deleteToy') {
        include "views/deleteToyForm.php";
    }
}


// controller for pet table

if (isset($_POST['submit_pet'])) {
    $controller->addPet();
    echo "Pet added successfully";
}

// PET PAGE
if (isset($_GET['page'])) {
    if ($_GET['page'] == 'pets') {
        $controller->displayPets();
    } else if ($_GET['page'] == 'addPet') {
        $controller->displayAddPetForm();
    }
}