<?php
namespace ExerciseDatabase;

interface ExecuteStatementInterface{
    public function execute(array $param = []):FetchResultSetInterface;
}