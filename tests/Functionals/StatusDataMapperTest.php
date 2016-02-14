<?php

use Model\Popo\Status;

class StatusDataMapperTest extends TestCase {

    private $con;

    public function setUp() {
        $this->con = new Dal\Connection('sqlite::memory:');
        $this->con->exec(<<<SQL
CREATE TABLE `statuses` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `message` varchar(152) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);
    
SQL
        );
    }

    public function testPersist() {
        $map = new Model\StatusesMapper($this->con);
        $status = new Model\Popo\Status(null, "Toto", "Salut!");
        $map->persist($status);
        $rows = $this->con->query('SELECT COUNT(*) FROM statuses')->fetch(\PDO::FETCH_NUM);
        $this->assertCount(1, $rows[0]);
    }

    public function testRemove() {
        $map = new Model\StatusesMapper($this->con);
        $status = new Status("", "Toto", "Salut!");
        $map->persist($status);
        $rows = $this->con->query('SELECT COUNT(*) FROM statuses')->fetch(\PDO::FETCH_NUM);
        $this->assertCount(1, $rows[0]);
        
        $this->assertTrue($map->remove($status));
        $rows = $this->con->query('SELECT COUNT(*) FROM statuses')->fetch(\PDO::FETCH_NUM);
        $this->assertCount(0, $rows[0]);
    }

}
