<?php
namespace Database;

use Generator;
// interface DatabaseStatementInterface{
//     public function execute(array $param = []):ResultSetInterface;
// }

class PDOStatement implements DatabaseStatementInterface
{
    private $pdoStatement;
    
    public function __construct($pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    public function execute(array $param = []):ResultSetInterface
    {
        $this->pdoStatement->execute($param);
        return new PDOResultSet($this->pdoStatement);
    }
}

