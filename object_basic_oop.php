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

    function __construct($name, $color, $joyconStatus)
    {
        $this->name = $name;
        $this->color = $color;
        $this->joyconStatus = $joyconStatus;
    }

    public function attachedJoycons()
    {
        if ($this->joyconStatus == true || $this->joyconStatus != true)
        {
            echo "Joycons are already attached";
        } else {
            echo "Joycons are not attached";
        }
    }

}

$switch = new SwitchConsole("Switch", "blue", false);

echo $switch->name;
echo "<br>";
echo $switch->color;
echo "<br>";
echo $switch->attachedJoycons();
echo "<br>";