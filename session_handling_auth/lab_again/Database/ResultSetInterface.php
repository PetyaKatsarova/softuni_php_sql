<?php

namespace Database;

interface ResultSetInterface
{
    public function fetch($className) : \Generator;
    // added later
    public function fetchAll(?string $className=null):\Generator;
}