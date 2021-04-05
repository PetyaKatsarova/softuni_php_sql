<?php
namespace Database;

use Database\DatabaseInterface;
use Database\DatabaseStatementInterface;
// interface DatabaseInterface{
//     public function query(string $query):DatabaseStatementInterface;
// }
class PDODatabase implements DatabaseInterface
{
    private $pdo;
    // what is the type of pdo?
    public function __construct($PDO)
    {
        $this->pdo = $PDO;
    }
    // takes in query and returns a stmt, which is pdo->prepare()
    public function query(string $query):DatabaseStatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOStatement($stmt);
    }
}
