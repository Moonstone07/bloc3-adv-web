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


class SpeciesModel
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
    public function getAllSpecies()
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to get all species
            $result = $mysqli->query("SELECT * FROM pet_species");
            $results = array();
            // Fetch all the rows from the result of the query
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            // Close the database connection
            $mysqli->close();
            // Return the fetched rows
            return $results;
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }

    public function insertSpecies($species_name)
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to insert the new species
            if ($mysqli->query("INSERT INTO pet_species (pet_species_type) VALUES ('$species_name')") === TRUE) {
                // Close the database connection
                $mysqli->close();
                // Return true if the insertion was successful
                return true;
            } else {
                // If the insertion was not successful, print the error and return false
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }

    public function updateSpecies($id, $new_species_name)
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to update the species
            $sql = "UPDATE pet_species SET pet_species_type = '$new_species_name' WHERE pet_species_id = '$id' ";
            if ($mysqli->query($sql) === TRUE) {
                // Close the database connection
                $mysqli->close();
                // Return true if the update was successful
                return true;
            } else {
                // If the update was not successful, print the error and return false
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }

    public function deleteSpecies($id)
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to delete the species
            $sql = "DELETE FROM pet_species WHERE pet_species_id = $id";
            if ($mysqli->query($sql) === TRUE) {
                // Close the database connection
                $mysqli->close();
                // Return true if the deletion was successful
                return true;
            } else {
                // If the deletion was not successful, print the error and return false
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }
}



?>

