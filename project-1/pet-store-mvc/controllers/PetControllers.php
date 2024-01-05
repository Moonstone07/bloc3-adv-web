<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{
    private $speciesModel;
    private $petModel;
    private $BreedModel;

    public function __construct($conn)
    {
        $this->speciesModel = new SpeciesModel($conn);
        $this->petModel = new PetModel($conn);
        $this->BreedModel = new BreedModel($conn);
    }

    public function petForm()
    {
        $species = $this->speciesModel->getSpeciesType();
        $breeds = $this->BreedModel->getAllBreeds();
        include "views/petForm.php";
    }


//  SPECIES TABLE MODEL
    public function addSpeciesType()
    {
        $type = $_POST['pet_species_type'];
        // Warning: Undefined array key "pet_species_type" in /var/www/vhosts/tischa79.web582.com/httpdocs/block3-adv-web/project-1/pet-store-mvc/controllers/PetControllers.php on line 32
     // Please fill out all fields

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
        $this->display();
    }

    public function updateSpeciesType($id, $new_pet_species_type)
    {
        return $this->speciesModel->updateSpeciesType($id, $new_pet_species_type);
    }

    public function deleteSpeciesType($id)
    {
        return $this->speciesModel->deleteSpeciesType($id);
    }


//  PET TABLE MODEL
public function addPet()
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $color = $_POST['color'];
    $breed_id = $_POST['breed_id'];
    $species_id = $_POST['species_id'];

    if (!$name || !$age || !$gender || !$color || !$breed_id || !$species_id) {
        echo "Please fill out all fields";
        $this->petForm();
        return;
    } elseif ($this->petModel->insertPet($name, $age, $gender, $color, $breed_id, $species_id)) {
        echo "Pet added successfully: $name";
    } else {
        echo "Error adding pet";
        $this->petForm();
    }
    $this->display();
}


// make only one display function then add as you go and call it in the controller
public function display()
{
    $species = $this->speciesModel->getSpeciesType();
    $pets = $this->petModel->getAllPets();
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
    $controller->addSpeciesType();
}

// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();





















    /* the display function is duplicating after insertion into the database. Previous table with old data will be displayed and a new table with the new data is also be displayed.
    */
?>