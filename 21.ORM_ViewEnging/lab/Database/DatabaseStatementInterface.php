<?php
namespace Database;

interface DatabaseStatementInterface
{
    public function execute(array $params = []) : ResultSetInterface;

    // public function fetch(): \Generator;
}
