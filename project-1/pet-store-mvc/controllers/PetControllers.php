<?php

ini_set('display_errors', 1);


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

    public function petForm()
    {
        include "views/petForm.php";
    }

    public function addPet(){
        // echo "addPet() method is called!";
        $name = $_POST['name'];
        $gender = $_POST ['gender'];
        $age = $_POST['age'];
        $color = $_POST['color'];

        if(!$name || !$gender || !$age || !$color){
            echo "Please fill out all fields";
            $this->petForm();
            return;
        }elseif ($this->model->insertPet($name, $gender, $age, $color)){
            echo "Pet added successfully: $name, $gender, $age, $color </br>";
        } else {
            echo "Error adding pet";
        }
        $this->displayPets();
    }
}
include_once 'controllers/config.php';
$connect2DA = new ConnectionDA
(
    $host ,
    $username,
    $password ,
    $dbname );

$controller = new PetController($connect2DA);

// $controller->displayPets();

if (isset($_POST['submit'])) {
    $controller->addPet();
    $controller->petForm();
} else {
    $controller->petForm();
}

?>