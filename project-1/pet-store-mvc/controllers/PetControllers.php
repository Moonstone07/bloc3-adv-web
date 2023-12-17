<?php

ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once 'models/model.php';

class PetController
{
    private $model;
    public function __construct($conn)
    {
        $this->model = new PetModel($conn);
    }

    public function displayPets()
    {
        $pets = $this->model->getPet();
        include "views/petView.php";
        // return $pets;
    }

    // public function petForm()
    // {
    //     include "views/petForm.php";
    // }

    // public function addPet(){
    //     $name = $_POST['name'];
    //     $age = $_POST['age'];
    //     $gender = $_POST ['gender'];
    //     $color = $_POST['color'];

    //     if(!$name || !$age || !$gender || !$color){
    //         echo "Please fill out all fields";
    //         $this->petForm();
    //         return;
    //     }elseif ($this->model->insertPet($name, $age, $gender, $color)){
    //         echo "Pet added successfully";
    //     } else {
    //         echo "Error adding pet";
    //     }
    //     $this->displayPets();
    // }
}

$connect2DA = new ConnectionDA
("localhost", "tischa_79", "4O37z~bf2", "tischa_pet_store");

$controller = new PetController($connect2DA);

$controller->displayPets();

// if (isset($_POST['submit'])) {
//     $controller->addPet();
// } else {
//     $controller->petForm();
// }

?>