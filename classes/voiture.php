<?php

class Cars
{
    private $marque;
    public $wheel;
    public $motors;
    public $consumption;
    const TEST = "Ceci est le test de la déclaration d'une constante";
    const NB_ROUE = 4;

    function __construct($wheel, $marque, $motors, $consumption)
    {
        $this->wheel = $wheel;
        $this->marque = $marque;
        $this->consumption = $consumption;
        $this->motors = $motors;
    }

    function getNbRoue()
    {
        return SELF::NB_ROUE;
    }

    public static function getStaticNb_Roue()
    {
        return SELF::NB_ROUE;
    }

    public function hellomycars()
    {
        return "Hello " . $this->marque . " have a wheels of " . $this->wheel . " inch and this motorisation is " . $this->motors . " this cars consumes " . $this->consumption;
    }

    public function getmarque()
    {
        return "The mark of " . $this->marque;
    }

    public function setmarque($newmarque)
    {
        $this->marque = $newmarque;
    }

    function __destruct()
    {
        echo "<br> Cars $this->marque has been destroyed. <br>";
    }
}
