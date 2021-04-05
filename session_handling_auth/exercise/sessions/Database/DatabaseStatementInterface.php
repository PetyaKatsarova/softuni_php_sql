<?php
namespace Database;
interface DatabaseStatementInterface{
    public function execute(array $param = []):ResultSetInterface;
}