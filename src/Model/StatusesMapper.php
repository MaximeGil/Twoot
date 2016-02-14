<?php

namespace Model;

use Model\Popo\Status;

class StatusesMapper {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function remove(Status $status) {
        $req = "DELETE from statuses where id=:id";
        return $this->con->executeQuery($req, array("id" => $status->getId()));
    }

    public function persist(Status $status) {
        $username = $status->getUsername();
        $message = $status->getMessage();
        $date = $status->getDate();

        $params = array(
            'username' => $username,
            'message' => $message,
            'date' => $date,
        );

        $req = "INSERT INTO statuses(id, username, message, date) values('',:username,:message,:date)";
        return $this->con->executeQuery($req, $params);
    }

}
