<?php

class Users
{

    private $name;
    private $firstname;
    private $email;
    private $phone;
    private $password;
    private $errors = [];

    function __construct($donnee)
    {
        if ($name !== "" && $firstname !== "") {
            $this->name = htmlspecialchars($name);
            $this->firstname = htmlspecialchars($firstname);
            if (preg_match('/^\w(\d|\w|[.]){0,30}[@](\d|\w|[.]){0,10}[.](\d|\w){2,4}/', $email)) {
                $this->email = htmlspecialchars($email);
                if (preg_match('/^\d{10}/', $phone)) {
                    $this->phone = htmlspecialchars($phone);
                    if (strlen($password) >= 8) {
                        $this->password = htmlspecialchars($password);
                    } else {
                        array_push($this->errors, 'Mot de passe incorrect');
                    }
                } else {
                    array_push($this->errors, 'Numéro de téléphone invalide');
                }
            } else {
                array_push($this->errors, 'Email Invalide');
            }
        } else {
            array_push($this->errors, 'Tous les champs doivent être compléter');
        }
    }


    function save()
    {
        if (!empty(array_filter($this->errors)) == 1) {
            foreach ($this->errors as $value) {
                echo "<p class='text-white bg-danger text-center mt-5 p-3'>" . $value .  "</p>";
                $this->errors = [];
            }
        } else {
            $y = json_decode(file_get_contents('user.json'), true);
            $resId = array_column($y, 'id');
            if (!empty($resId)) {
                $Id = max($resId) + 1;
            } else {
                $Id = 0;
            }
            $x = [[
                "id" => $Id,
                "name" => $this->name,
                "firstname" => $this->firstname,
                "email" => $this->email,
                "phone" => $this->phone,
                "password" => $this->password
            ]];
            $z = array_merge($y, $x);
            file_put_contents('user.json', json_encode($z));
        }
    }

    public static function getAllUser()
    {
    }

    public static function getUserById()
    {
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

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
