<?php
namespace Database;

interface ResultSetInterface{
    public function fetchAll($className) : \Generator;
}