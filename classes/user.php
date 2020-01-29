<?php

class Users
{
    private $name;
    private $firstname;
    private $email;
    private $password;
    private $phone;
    private $errors = [];

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    function __construct($donnee)
    {
        $this->hydrate($donnee);
    }

    public static function getAllUser()
    {
        $users = json_decode(file_get_contents('user.json'));
        foreach ($users as $val) {
            echo "<div class='d-flex'>";
            foreach ($val as $key => $user) {
                echo "<p>" . $key . " " . $user . "</p>";
            }
            echo "</div>";
        }
    }

    public static function getUserById($id)
    {
        $users = json_decode(file_get_contents('user.json'));
        foreach ($users as $key => $val) {
            echo "<div class='d-flex'>";

            if ($key == $id) {
                foreach ($val as $key => $user) {
                    echo "<p>" . $key . " " . $user . "</p>";
                }
            }
            echo "</div>";
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (preg_match('/^\w(\d|\w|[.]){0,30}[@](\d|\w|[.]){0,10}[.](\w){2,4}/', $email)) {
            $this->email = htmlspecialchars($email);
        } else {
            array_push($this->errors, 'Email Invalide');
        }
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if (strlen($password) >= 8) {
            $this->password = htmlspecialchars($password);
        } else {
            array_push($this->errors, 'Mot de passe incorrect');
        }
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        if (preg_match('/^\d{10}$/', $phone)) {
            $this->phone = htmlspecialchars($phone);
        } else {
            array_push($this->errors, 'Numéro de téléphone invalide');
        }
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        if ($firstname !== "") {
            $this->firstname = htmlspecialchars($firstname);
        } else {
            array_push($this->errors, 'Prénom invalide');
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        if ($name !== "") {
            $this->name = htmlspecialchars($name);
        } else {
            array_push($this->errors, 'Nom invalide');
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

    // function getObjectJson(){
    //     $name = $this->name . '.json';
    //     file_put_contents($name, json_encode(get_object_vars($this)));
    // }
}
