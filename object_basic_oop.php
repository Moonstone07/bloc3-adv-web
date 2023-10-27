<?php

// Enable error displaying
ini_set('display_errors', 1);

// Define a class called SwitchConsole
class SwitchConsole
{
    // Define public properties for the console's name, color, and joycon status
    public $name; // this is a field
    public $color;
    public $joyconStatus;
    private $gamesInserted = false;
    private $powerStatus = false;

    function __construct($name, $color, $joyconStatus, $gamesInserted)
    {
        $this->name = $name;
        $this->color = $color;
        $this->joyconStatus = $joyconStatus;
        $this->gamesInserted = $gamesInserted;
    }

    public function powerOn()
    {
        if (!$this->powerStatus) {
            echo "turning on";
            $this->powerStatus = true; // sets the power status to true indicating power is on
        } else {
            //if power status is true then power is off
            echo "Power is off";
        }
    }


    public function attachedJoycons()
    {
        if ($this->joyconStatus == true) {
            echo "Joycons are already attached";
        } else {
            echo "Joycons are not attached";
        }
    }

    public function insertGame()
    {
        if (!$this->gamesInserted) {
            echo "Game is already inserted";
        } else {
            echo "Game is not inserted";
        }
        return $this->gamesInserted;
    }
}

$switch = new SwitchConsole("Switch", "blue", false, false);

echo $switch->name;
echo "<br>";
echo $switch->color;
echo "<br>";
echo $switch->attachedJoycons();
echo "<br>";
echo $switch->insertGame();
echo "<br>";
echo $switch->powerOn();
