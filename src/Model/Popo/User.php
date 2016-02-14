<?php

namespace Model\Popo;

class User {

    private $id;
    private $username;
    private $age;
    private $dateregister;
    private $password;

    public function __construct($username, $age, $dateregister, $password, $id = null) {
        $this->id = $id;
        $this->username = $username;
        $this->age = $age;
        $this->dateregister = $dateregister; 
        $this->password = $password; 
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->id = $username;
    }
    
    public function getAge()
    {
        return $this->age;
    }
    
    public function getDateRegister()
    {
        return $this->dateregister;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

}
