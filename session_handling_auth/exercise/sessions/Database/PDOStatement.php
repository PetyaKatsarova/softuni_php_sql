<?php
namespace Database;

use Generator;

class PDOStatement implements DatabaseStatementInterface{
    private $pdoStatement;

   public function __construct(\PDOStatement $PDOStatement)
   {
       $this->pdoStatement = $PDOStatement;
   }
    public function execute(array $param=[]):ResultSetInterface
    {
       $this->pdoStatement->execute($param);
        return new PDOResultSet($this->pdoStatement);
    }
    public function fetch(): Generator
    {
        
    }
}


// interface DatabaseStatementInterface{
//     public function execute(array $param = []):ResultSetInterface;
// }

