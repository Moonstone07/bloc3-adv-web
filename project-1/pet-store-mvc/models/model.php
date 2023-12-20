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
    public function getPet()
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM pets");
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }


    // insert a new pet into the database
    public function insertPet($pet_Name, $pet_Gender, $pet_Age, $pet_Color)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            if ($mysqli->query("INSERT INTO pets (pet_Name, pet_Gender, pet_Age, pet_Color) VALUES ('$pet_Name', '$pet_Gender', '$pet_Age', '$pet_Color')") === TRUE) {
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
}
?>