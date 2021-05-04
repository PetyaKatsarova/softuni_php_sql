<?php
namespace Database;
// interface ResultSetInterface{
//     public function fetchAll($className) : \Generator;
// }
class PDOResultSet implements ResultSetInterface
{
   private $pdoStatement;

   public function __construct(\PDOStatement $PDOStatement)
   {
       $this->pdoStatement = $PDOStatement;
   }
   public function fetchAll($className): \Generator
   {
       while($row=$this->pdoStatement->fetchObject($className)){
           yield $row;
       }
   }
//    public function fetch($className)
//    {
//        return $this->pdoStatement->fetchObject($className);
//    }
}