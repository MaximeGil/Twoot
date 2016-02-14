<?php

namespace Model;

use Exception\ExceptionHandler;
use Exception\HttpException;

class InMemoryFinder implements \Model\FinderInterface {

    private $data = array();

    public function __construct() {
        $this->data = [
            array("id" => 1, "message" => "Hi, i'm Maxime", "username" => "MaximeGil", "date" => "12/09/1994"),
            array("id" => 2, "message" => "Hi, i'm MyriamKhettab", "username" => "MyriamKhettab", "date" => "13/09/1794"),
            array("id" => 3, "message" => "Hi, i'm MymyKhettab", "username" => "MymyKhettab", "date" => "14/10/1894"),
        ];
    }

    public function findAll() {
        return $this->data;
    }

    public function findOneById($id) {
        $element = null;

        foreach ($this->data as $key => $val) {
            if ($val['id'] == $id) {
                $element = array("id" => $val['id'], "message" => $val['message'], "username" => $val['username'], "date" => $val['date']);
            }
        }

        if ($element == null) {
            throw new HttpException(404, 'Status not found');
        }

        return $element;
    }

    public function insertOne() {
        
    }

}
