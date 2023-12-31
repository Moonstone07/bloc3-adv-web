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

    public function petForm()
    {
        include "views/petForm.php";
    }

    public function addSpeciesType()
    {
        $type = $_POST['type'];

        if (!$type) {
            echo "Please fill out all fields";
            $this->petForm();
            return;
        } elseif ($this->model->insertSpeciesType($type)) {
            echo "Pet type added successfully: $type";
        } else {
            echo "Error adding pet type";
            $this->petForm();
        }
        $this->displaySpeciesType();
    }

    public function updateSpeciesType($id, $new_pet_species_type)
    {
        return $this->model->updateSpeciesType($id, $new_pet_species_type);
    }

    public function deleteSpeciesType($id)
    {
        return $this->model->deleteSpeciesType($id);
    }


    public function displaySpeciesType()
    {
        $species = $this->model->getSpeciesType();
         // var_dump($species);
        include "views/petView.php";
        // return $pets;
    }

    /* the display function is not working, it is not displaying the pet species type only NULL. It was displaying the table before, but i tried deleting in phpmyadmin. I am not sure if that is the reason why it is not displaying the table.
    */
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
    $controller->petForm();
} else {
    $controller->petForm();
}

// if (isset($_POST['update_id'])) {
//     $controller->updateSpeciesType($_POST['update_id'], $_POST['new_species_type']);
// }

// if (isset($_POST['delete_id'])) {
//     $controller->deleteSpeciesType($_POST['delete_id']);
// }

?>