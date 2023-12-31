<?php

ini_set('display_errors', 1);

include_once 'models/model.php';

class PetController
{
    private $model;
    private $speciesModel;
    // private $breedModel;
    // private $toyModel;
    public function __construct($conn)
    {
        $this->model = new PetModel($conn);
        $this->speciesModel = new SpeciesModel($conn);
        // $this->breedModel = new BreedModel($conn);
        // $this->toyModel = new ToyModel($conn);
    }

    public function petForm()
    {
        include "views/petForm.php";
    }


    public function displaySpeciesType()
    {
        // $species = $this->model->getPet();
        // var_dump($specie);
        include "views/petView.php";
        // return $pets;
    }

    /* the display function is duplicating after insertion into the database. Previous table with old data will be displayed and a new table with the new data is also be displayed.
    */

//     pet class model
    public function addPet()
    {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $color = $_POST['color'];
        $breed = $_POST['breed'];
        $toy = $_POST['toy'];
        $species = $_POST['species'];

        if (!$name || !$age || !$breed || !$toy || !$species) {
            echo "Please fill out all fields";
            $this->petForm();
            return;
        } elseif ($this->model->insertPet($name, $age, $color, $breed, $toy, $species)) {
            echo "Pet added successfully: $name, $age, $color, $breed, $toy, $species";
        } else {
            echo "Error adding pet";
            $this->petForm();
        }
        $this->displaySpeciesType();
    }

    public function updatePet($id, $new_pet_name, $new_pet_age, $new_pet_breed, $new_pet_toy, $new_pet_species)
    {
        return $this->model->updatePet($id, $new_pet_name, $new_pet_age, $new_pet_breed, $new_pet_toy, $new_pet_species);
    }

    public function deletePet($id)
    {
        return $this->model->deletePet($id);
    }



//     species class model
    public function addSpeciesType()
    {
        $type = $_POST['type'];

        if (!$type) {
            echo "Please fill out all fields";
            $this->petForm();
            return;
        } elseif ($this->speciesModel->insertSpeciesType($type)) {
            echo "Pet type added successfully: $type";
        } else {
            echo "Error adding pet type";
            $this->petForm();
        }
        $this->displaySpeciesType();
    }

    public function updateSpeciesType($id, $new_pet_species_type)
    {
        return $this->speciesModel->updateSpeciesType($id, $new_pet_species_type);
    }

    public function deleteSpeciesType($id)
    {
        return $this->speciesModel->deleteSpeciesType($id);
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

$controller->displaySpeciesType();

if (isset($_POST['submit'])) {
    $controller->addSpeciesType();
}

// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();

if (isset($update_id) && isset($new_species_type)) {
    $controller->updateSpeciesType($update_id, $new_species_type);
}

if (isset($delete_id)) {
    $controller->deleteSpeciesType($delete_id);
}

?>