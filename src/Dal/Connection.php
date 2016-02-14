<?php

namespace Dal;

class Connection extends \PDO {

    public function executeQuery($query, array $parameters = []) {
        $stmt = $this->prepare($query);
        foreach ($parameters as $col => $value) {
            $stmt->bindValue(':' . $col, $value);
        }
        return $stmt->execute();
    }

}
