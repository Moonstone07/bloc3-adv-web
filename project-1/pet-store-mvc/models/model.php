<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class connectionDA
{
    public function __construct(public $host, public $username, public $password, public $dbname)
    {
    }
}

class petModel
{
    private $mysqli;
    private $connectionDA;
    public function __construct($connectionDA)
    {
        $this->connectionDA = $connectionDA;
    }

    public function connect()
    {
        try {
            $mysqli = new mysqli(
                $this->connectionDA->host, 
                $this->connectionDA->username, 
                $this->connectionDA->password, 
                $this->connectionDA->dbname
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
            $result = $mysqli->query("SELECT * FROM pet");
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
    public function insertPet($name, $age, $gender, $color)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $mysqli->query("INSERT INTO pet (name, age, gender, color) VALUES ('$name', '$age', '$gender', '$color')");
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }
}
