<?php

abstract class Vehicles
{
    protected $marque;
    protected $numberWheel;
    protected static $remorque = 1;

    function __construct($marque, $numberWheel)
    {
        $this->marque = $marque;
        $this->numberWheel = $numberWheel;
    }

    public function getVehicles()
    {
        return 'This ' . $this->marque . ' brand vehicles has ' . $this->numberWheel . ' wheels !';
    }


    public static function getRemorque()
    {
        return 'Remorque : ' . static::$remorque;
    }

    abstract public static function getMotorisation();


}