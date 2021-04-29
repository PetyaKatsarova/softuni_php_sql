<?php
namespace ExerciseDatabase;

interface PrepareDbInterface{
    public function query(string $query):ExecuteStatementInterface;
}