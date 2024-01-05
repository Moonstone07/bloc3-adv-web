<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{
    private $speciesModel;
    private $petModel;

    public function __construct($conn)
    {
        $this->speciesModel = new SpeciesModel($conn);
        $this->petModel = new PetModel($conn);
    }

    public function petForm()
    {
        include "views/petForm.php";
    }


//  SPECIES TABLE MODEL
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

if (isset($update_id) && isset($new_species_type)) {
    $controller->updateSpeciesType($update_id, $new_species_type);
}

if (isset($delete_id)) {
    $controller->deleteSpeciesType($delete_id);
}


















    /* the display function is duplicating after insertion into the database. Previous table with old data will be displayed and a new table with the new data is also be displayed.
    */
?>