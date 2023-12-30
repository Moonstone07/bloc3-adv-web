<?php

ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class ConnectionDA
{
    public function __construct(public $host, public $username, public $password, public $dbname)
    {
    }
}

class PetModel
{
    private $mysqli;
    private $ConnectionDA;
    public function __construct($ConnectionDA)
    {
        $this->ConnectionDA = $ConnectionDA;
    }

    public function connect()
    {
        try {
            $mysqli = new mysqli(
                $this->ConnectionDA->host,
                $this->ConnectionDA->username,
                $this->ConnectionDA->password,
                $this->ConnectionDA->dbname
            );

            if ($mysqli->connect_error) {
                throw new Exception("could not connect");
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }


    // select all pets from the database
    public function getSpeciesType()
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM pet_species");
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            // return $results;
        } else {
            return false;
        }
    }


    // insert a new pet into the database
    public function insertSpeciesType($pet_species_type)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            if ($mysqli->query("INSERT INTO pet_species (pet_species_type) 
            
            VALUES ('$pet_species_type')") === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }

    // //update a species type
    // public function updateSpeciesType($id, $new_pet_species_type)
    // {
    //     $mysqli = $this->connect();
    //     if ($mysqli) {
    //         $sql = "UPDATE pet_species SET pet_species_type = '$new_pet_species_type' WHERE pet_species_id = $id";
    //         if ($mysqli->query($sql) === TRUE) {
    //             $mysqli->close();
    //             return true;
    //         } else {
    //             echo "Error: " . $mysqli->error;
    //             $mysqli->close();
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }

    // //delete a species type

    // public function deleteSpeciesType($id)
    // {
    //     $mysqli = $this->connect();
    //     if ($mysqli) {
    //         $sql = "DELETE FROM pet_species WHERE pet_species_id = $id";
    //         if ($mysqli->query($sql) === TRUE) {
    //             $mysqli->close();
    //             return true;
    //         } else {
    //             echo "Error: " . $mysqli->error;
    //             $mysqli->close();
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }
}
?>


<!-- create multiple selects for each tables and display all tables with parent table -->