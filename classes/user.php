<?php

class Users {

    private $name;
    private $firstname;
    private $email;
    private $phone;
    private $password;

    function __construct($name, $firstname, $email, $phone, $password)
    {
        $this->name = htmlspecialchars($name);
        $this->firstname = htmlspecialchars($firstname);
        $this->email = htmlspecialchars($email);
        $this->phone = htmlspecialchars($phone);
        $this->password = htmlspecialchars($password);
    }


    function save(){
        $x = [ "name" => $this->name,
        "firstname" => $this->firstname,
        "email" => $this->email,
        "phone" => $this->phone,
        "password" => $this->password];
        $y = array(file_get_contents('coucou.txt'));
        $z = array_push($y, $x);

        file_put_contents('coucou.txt', $z);
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
 
    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
