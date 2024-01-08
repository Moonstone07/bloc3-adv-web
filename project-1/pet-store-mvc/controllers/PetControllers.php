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
        include "views/petForm.php";
    }

    //  PET TABLE MODEL
    public function addPet()
    {
        if (isset($_POST['pet_name'], $_POST['pet_gender'], $_POST['pet_age'], $_POST['pet_color'], $_POST['breed_id'], $_POST['species_id'])) {
            $pet_name = $_POST['pet_name'];
            $pet_gender = $_POST['pet_gender'];
            $pet_age = $_POST['pet_age'];
            $pet_color = $_POST['pet_color'];
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



    //  DISPLAY FUNCTION
    // make only one display function then add as you go and call it in the controller
    public function display()
    {
        $pets = $this->PetModel->getAllPets();
        $species = $this->SpeciesModel->getAllSpecies();
        $breeds = $this->BreedModel->getAllBreeds();
        $toys = $this->ToyModel->getAllToys();
        include "views/petView.php";
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


// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();
