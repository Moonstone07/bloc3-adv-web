<?php

// error displaying
ini_set('display_errors', 1);

class switchConsole
{
    public $name;
    public $color;
    public $joyconStatus;

    public function detachJoycons()
    {
        if($this->joyconStatus != true)
        {
            echo "Joycons are now detached";
        }
    }

    public function attachJoycons()
    {
        if($this->joyconStatus == true)
        {
            echo "Joycons are already attached";
        }
    } 

    function __construct($name, $color, $joyconStatus)
    {
        $this->name = $name;
        $this->color = $color;
        $this->joyconStatus = $joyconStatus;

    }
}

$switch = new switchConsole("Switch", "blue" , false);

echo $switch->name;
echo "<br>";
echo $switch->color;
echo "<br>";
echo $switch->joyconStatus;
