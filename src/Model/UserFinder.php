<?php

namespace Model;

use Model\Popo\User;

class UserFinder implements \Model\FinderInterface {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function findAll() {
        $req = $this->con->prepare("SELECT * from users");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function findOneByUsername($username) {
        $req = $this->con->prepare("SELECT * from users where username=:username");
        $req->bindValue(':username', $username);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_ASSOC);
        
        $user = new User($result['username'], $result['age'], $result['dateregister'], $result['password'], $result['id']);
        
        return $user;
    }

    public function findOneById($id) {
        $req = $this->con->prepare("SELECT * from users where id=:id");
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_ASSOC);
        
        

        return $result;
    }

    public function insertOne($user) {
//        $username = $status['username'];
//        $message = $status['message'];
//        $date = date("Y-m-d H:i:s");
//        
//        $req = $this->con->prepare("INSERT into statuses VALUES('', :username, :message, :date)");
//        $req->bindValue(':username', $username);
//        $req->bindValue(':message', $message);
//        $req->bindValue(':date', $date);
//        $req->execute();
    }

    public function deleteOne($id) {
        $req = $this->con->prepare("DELETE from users where id=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }

}
