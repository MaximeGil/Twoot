<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

class StatusesFinder implements \Model\FinderInterface {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function findAll() {
        $req = $this->con->prepare("SELECT * from statuses");
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function findOneById($id) {
        $req = $this->con->prepare("SELECT * from statuses where id=:id");
        $req->bindValue(':id', $id);
        $req->execute();
        $result = $req->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function insertOne($status) {
        $username = $status['username'];
        $message = $status['message'];
        $date = date("Y-m-d H:i:s");
        
        $req = $this->con->prepare("INSERT into statuses VALUES('', :username, :message, :date)");
        $req->bindValue(':username', $username);
        $req->bindValue(':message', $message);
        $req->bindValue(':date', $date);
        $req->execute();
    }

    public function deleteOne($id) {
        $req = $this->con->prepare("DELETE from statuses where id=:id");
        $req->bindValue(':id', $id);
        $req->execute();
    }

}
