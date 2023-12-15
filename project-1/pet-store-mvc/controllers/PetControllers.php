<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'models/model.php';

class PetController
{
    private $model;
    public function __construct($conn)
    {
        $this->model = new petModel($conn);
    }

    public function displayPets()
    {
        $pets = $this->model->getPet();
        include "views/petView.php";
        return $pets;
    }

    public function PetForm()
    {
        include "views/petForm.php";
    }

    public function addPet(){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST ['gender'];
        $color = $_POST['color'];

        if(!$name || !$age || !$gender || !$color){
            echo "Please fill out all fields";
            $this->PetForm();
            return;
        }elseif ($this->model->insertPet($name, $age, $gender, $color)){
            echo "Pet added successfully";
        } else {
            echo "Error adding pet";
        }
        $this->displayPets();
    }
}

$connect2DA = new connectionDA("
localhost:3306", "tischa", "3Dj7e9$5i", "tischa79_adv_web");

$controller = new PetController($connect2DA);

if (isset($_POST['submit'])) {
    $controller->addPet();
} else {
    $controller->PetForm();
}

?>