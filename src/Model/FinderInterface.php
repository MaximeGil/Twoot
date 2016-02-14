<?php

namespace Model;

interface FinderInterface
{
    public function findAll();

    public function findOneById($id);
    
    public function insertOne($status);
    
    public function deleteOne($id);
}
