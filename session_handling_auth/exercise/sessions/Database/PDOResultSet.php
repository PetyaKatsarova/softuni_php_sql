<?php
namespace Database;
// interface ResultSetInterface{
//     public function fetch($className) : \Generator;
// }
class PDOResultSet implements ResultSetInterface
{
   private $pdoStatement;

   public function __construct(\PDOStatement $PDOStatement)
   {
       $this->pdoStatement = $PDOStatement;
   }
   public function fetch($className): \Generator
   {
       while($row=$this->pdoStatement->fetchObject($className)){
           yield $row;
       }
   }
}