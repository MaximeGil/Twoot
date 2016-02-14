<?php

namespace Model;

use Exception\HttpException;

class JsonFinder implements FinderInterface {

    private $file;

    public function __construct() {

        $this->file = file_get_contents("../data/statuses.json");
    }

    public function findAll() {
        $json_d = json_decode($this->file);
        return $json_d;
    }

    public function findOneById($id) {
        $json_d = json_decode($this->file);
        $element = null;

        foreach ($json_d as $key => $val) {
            if ($val->id == $id) {
                $element = array("id" => $val->id, "message" => $val->message, "username" => $val->username, "date" => $val->date);
            }
        }

        if ($element == null) {
            throw new HttpException(404, 'Status not found');
        }

        return $element;
    }

    public function insertOne($status) {

        $list = self::findAll();
        $id = sizeof($list) + 1;

        $one = array("id" => $id, "message" => $status['message'], "username" => $status['username'], "date" => $status['date']);

        $list[] = $one;

        $json = json_encode($list);

        file_put_contents("../data/statuses.json", "");

        file_put_contents("../data/statuses.json", $json);
    }

    public function deleteOne($id) {

        $json_d = json_decode($this->file, true);

        foreach ($json_d as $key => $val) {

            if ($val['id'] == $id) {
                unset($json_d[$key]);
            }
        }

        $list = json_encode($json_d);

        file_put_contents("../data/statuses.json", "");

        file_put_contents("../data/statuses.json", $list);
    }

}
