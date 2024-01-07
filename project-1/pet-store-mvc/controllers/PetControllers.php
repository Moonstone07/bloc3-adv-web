<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{
    private $ToyModel;

    public function __construct($conn)
    {
        $this->ToyModel = new ToyModel($conn);
    }

    public function petForm()
    {
        include "views/petForm.php";
    }

    // TOYS

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

    public function updateToy($id, $new_toy_name, $new_toy_price)
    {
        return $this->ToyModel->updateToy($id, $new_toy_name, $new_toy_price);
    }

    public function deleteToy($id)
    {
        return $this->ToyModel->deleteToy($id);
    }



    //  DISPLAY FUNCTION
    // make only one display function then add as you go and call it in the controller
    public function display()
    {
        $toys = $this->getToys();
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
    // $controller->addBreedType();
    // $controller->addSpeciesType();
    $controller->addToyType();
}

if (isset($_POST['update'])) {
    $controller->updateToy($_POST['update'], $_POST['new_toy_name'], $_POST['new_toy_price']);
}

if (isset($_POST['delete'])) {
    $controller->deleteToy($_POST['delete']);
}


// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();
