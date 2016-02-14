<?php
namespace Model;

use Model\Popo\User;

class UserMapper {

    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function remove(User $user) {
        $req = "DELETE from users where id=:id";
        return $this->con->executeQuery($req, array("id" => $user->getId()));
    }

    public function persist(User $user) {
        $username = $user->getUsername();
        $age = $user->getAge();
        $password = $user->getPassword();
        $dateregister = $user->getDateRegister();

        $params = array(
            'username' => $username,
            'age' => $age,
            'dateregister' => $dateregister,
            'password' => $password
        );

        $req = "INSERT INTO users values('',:username,:age,:dateregister, :password)";
        return $this->con->executeQuery($req, $params);
    }

}
