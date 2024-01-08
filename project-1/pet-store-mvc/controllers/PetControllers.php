<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{

    public function __construct($conn)
    {
    }

    public function petForm()
    {
        include "views/petForm.php";
    }




    //  DISPLAY FUNCTION
    // make only one display function then add as you go and call it in the controller
    public function display()
    {
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
}




// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();
