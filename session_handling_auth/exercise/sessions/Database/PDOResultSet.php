<?php
namespace Database;

class PDOResultSet implements ResultSetInterface
{
   private $pdoStatement;
   public function __construct(\PDOStatement $PDOStatement)
   {
       $this->pdoStatement = $PDOStatement;
   }
   public function fetch($classNamr):\Generator
   {
       
   }
}