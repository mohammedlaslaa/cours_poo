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
        $y = json_decode(file_get_contents('user.json'), true);
        $resId = array_column($y, 'id');
        if(!empty($resId)) {
            $Id = max($resId)+1;
        }else{
            $Id = 0;
        }
        $x = [[
            "id" => $Id,
            "name" => $this->name,
        "firstname" => $this->firstname,
        "email" => $this->email,
        "phone" => $this->phone,
        "password" => $this->password]];
        
        $z = array_merge($y, $x);
        file_put_contents('user.json', json_encode($z));
    }

    public static function getAllUser(){
        
    }

    public static function getUserById(){

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
