<?php

namespace Mapper;

use Model\StatusesMapper;
use Model\Popo\Status;

class StatusesTest extends \TestCase {

    protected $con;
    protected $statusMap;

    public function setUp() {
        $this->con = $this->getMock('Mapper\MockConnection');
        $this->con
                ->expects($this->once())
                ->method('executeQuery');

        $this->statusMap = new StatusesMapper($this->con);
    }

    public function testPersist() {
        $status = new Status('42','test', date("Y-m-d H:i:s"), 'toto');
        $this->statusMap->persist($status);
    }

    public function testRemove() {
        $status = new Status('42','test', date("Y-m-d H:i:s"), 'toto');
        $this->statusMap->remove($status);
    }

}
