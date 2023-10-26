<?php

// error displaying
ini_set('display_errors', 1);

class switchConsole
{
    // Properties
    public $name = 'Switch';
    public $price = 0;
    public $color = 'black';
    public $storage = 0;
    public $joyconsStatus;

    private $account;
    private $gamesInstalled;


    // Method

    public function deviceColor()
    {
        return $this->color;
    }

    public function installGame()
    {
        $this->gamesInstalled++;
    }

    public function detachJoycons()
    {
        $this->joyconsStatus = false;
    }

    public function attachJoycons()
    {
        $this->joyconsStatus = true;
    }

}

$switch = new switchConsole();

$switch->attachJoycons();
$switch->installGame();
$switch->detachJoycons();


echo $switch->name;
echo '<br>';
echo $switch->price;
echo '<br>';
echo $switch->storage;
