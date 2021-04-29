<?php
namespace ExerciseDatabase;

interface FetchResultSetInterface{
    public function fetch($className) : \Generator;
}