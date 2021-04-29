<?php
namespace ExerciseDatabase;

class FetchResultSet implements FetchResultSetInterface
{
   private $pdoStatement;

   public function __construct(\PDOStatement $PDOStatement)
   {
       $this->pdoStatement = $PDOStatement;
   }
   public function fetch($className): \Generator
   {
       while($row=$this->pdoStatement->fetchObject($className)){
        //    yild meaning return/ returns the last row
        // this way returns only 1 row and not all the rows: better performance
           yield $row;
       }
   }
}