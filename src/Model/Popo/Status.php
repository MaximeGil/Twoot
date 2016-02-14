<?php

namespace Model\Popo;

class Status {
 
    private $id;
    private $username;
    private $message;
    private $date;
    
    public function __construct($id =null, $username = null, $message = null)
    {
        $this->id= $id; 
        $this->username = $username;
        $this->message = $message;
        $this->date = date("Y-m-d H:i:s");
    }   
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
    public function getDate()
    {
        return $this->date; 
    }
    
    public function getId()
    {
        return $this->id;
    }
}
