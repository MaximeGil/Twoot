<?php

use Model\Popo\User;

class UserDataMapperTest extends \TestCase {

    private $con;

    public function setUp() {
        $this->con = new Dal\Connection('sqlite::memory:');
        $this->con->exec(<<<SQL
CREATE TABLE  IF NO EXISTS users (
   id mediumint NOT NULL AUTO_INCREMENT,
   username VARCHAR(50),
   age int,
   dateregister datetime,
   password VARCHAR(50),
   PRIMARY KEY(id)
);
    
SQL
        );
    }

    public function testPersist() {
        $map = new Model\UserMapper($this->con);
        $user = new User("toto", "16", date("Y-m-d H:i:s"), "test", 42);
        $map->persist($user);
        $rows = $this->con->query('SELECT COUNT(*) FROM statuses')->fetch(\PDO::FETCH_NUM);
        $this->assertCount(1, $rows[0]);
    }

    public function testRemove() {
        $map = new Model\UserMapper($this->con);
        $user = new User("toto", "16", date("Y-m-d H:i:s"), "test", 42);
        $map->remove($user);
        $rows = $this->con->query('SELECT COUNT(*) FROM statuses')->fetch(\PDO::FETCH_NUM);
        $this->assertCount(0, $rows[0]);
    }

}
