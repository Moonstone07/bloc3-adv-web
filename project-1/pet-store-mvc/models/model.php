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


class BreedModel
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

    public function getAllBreeds()
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM pet_breed");
            $results = array();
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

    public function insertBreed($breed_name)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            if ($mysqli->query("INSERT INTO pet_breed (pet_breed_name) VALUES ('$breed_name')") === TRUE) {
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

    public function updateBreed($id, $new_breed_name)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "UPDATE pet_breed SET pet_breed_name = '$new_breed_name' WHERE pet_breed_id = '$id' ";
            if ($mysqli->query($sql) === TRUE) {
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

    public function deleteBreed($id)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "DELETE FROM pet_breed WHERE pet_breed_id = $id";
            if ($mysqli->query($sql) === TRUE) {
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


<!-- create multiple selects for each tables and display all tables with parent table -->