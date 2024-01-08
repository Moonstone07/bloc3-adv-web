<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{
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

    public function petForm()
    {
        $pets = $this->PetModel->getAllPets();
        $species = $this->SpeciesModel->getAllSpecies();
        $breeds = $this->BreedModel->getAllBreeds();
        $toys = $this->getToys();
        include "views/petForm.php";
    }

    //  DISPLAY FUNCTION
    // make only one display function then add as you go and call it in the controller
    public function display()
    {
        $pets = $this->PetModel->getAllPets();
        $species = $this->SpeciesModel->getAllSpecies();
        $breeds = $this->BreedModel->getAllBreeds();
        $toys = $this->getToys();
        include "views/petView.php";
    }

    //  PET TABLE MODEL
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
                echo "Pet added successfully";
            } else {
                echo "Error adding pet";
            }
        } else {
            echo "All fields are required.";
        }
    }

    //  SPECIES TABLE MODEL

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

    //  TOY TABLE MODEL

    public function addToyType()
    {
        if (isset($_POST['name']) && isset($_POST['price'])) {
            $toy_name = $_POST['name'];
            $toy_price = $_POST['price'];
            $this->ToyModel->insertToy($toy_name, $toy_price);
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

$controller->display();


if (isset($_POST['submit'])) {
    $controller->addPet();
    $controller->addSpeciesType();
    $controller->addBreedType();
    $controller->addToyType();
}

// information inserting into the corresponding table and incorrect tables 

if (isset($_POST['pet_species_id'], $_POST['new_species_name'])) {
    $controller->updateSpeciesName($_POST['pet_species_id'], $_POST['new_species_name']);
}

if (isset($_POST['delete_species'])) {
    $controller->deleteSpeciesType();
}

if (isset($_POST['pet_breed_id'], $_POST['new_breed_name'])) {
    $controller->updateBreedName($_POST['pet_breed_id'], $_POST['new_breed_name']);
}

if (isset($_POST['delete'])) {
    $controller->deleteBreedType();
}

if (isset($_POST['pet_toy_id'], $_POST['new_toy_name'])) {
    $controller->updateToyName($_POST['pet_toy_id'], $_POST['new_toy_name']);
}

if (isset($_POST['delete'])) {
    $controller->deleteToyType();
}


// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();
