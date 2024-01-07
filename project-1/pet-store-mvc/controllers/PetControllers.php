<?php

ini_set('display_errors', 1);

include_once 'models/model.php';


class PetController
{
    private $BreedModel;

    public function __construct($conn)
    {
        $this->BreedModel = new BreedModel($conn);
    }

    public function petForm()
    {
        $breeds = $this->BreedModel->getAllBreeds();
        // var_dump($breeds);
        include "views/petForm.php";
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


    //  DISPLAY FUNCTION
    // make only one display function then add as you go and call it in the controller
    public function display()
    {
        $breeds = $this->BreedModel->getAllBreeds();
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
    $controller->addBreedType();
}

if (isset($_POST['pet_breed_id'], $_POST['new_breed_name'])) {
    $controller->updateBreedName($_POST['pet_breed_id'], $_POST['new_breed_name']);
}

if (isset($_POST['delete'])) {
    $controller->deleteBreedType();
}


// Calling petForm() only once regardless of whether 'submit' is set
$controller->petForm();



/* the display function is duplicating after insertion into the database. Previous table with old data will be displayed and a new table with the new data is also be displayed.
*/
