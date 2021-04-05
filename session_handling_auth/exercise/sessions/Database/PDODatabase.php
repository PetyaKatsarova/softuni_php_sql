<?php
namespace Database;

use Database\DatabaseInterface;
use Database\DatabaseStatementInterface;

class PDODatabase implements DatabaseInterface
{
    private $pdo;

    public function __construct(\PDO $PDO)
    {
        $this->pdo = $PDO;
    }
    public function query(string $query):DatabaseStatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new PDOStatement($stmt);
    }
}
