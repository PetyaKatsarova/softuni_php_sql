<?php
namespace Database;

class DatabaseStatement implements DatabaseStatementInterface
{
    private $pdoStmt;

    /**
     * DatabaseStatement constructor.
     * @param $pdoStmt
     */
    public function __construct(\PDOStatement $pdoStmt)
    {
        $this->pdoStmt = $pdoStmt;
    }

    //petya 
    // public function execute(array $params = []): DatabaseStatementInterface
    // {
    //     $this->pdoStmt->execute($params);

    //     return $this;
    // }

    public function execute(array $params = []) : ResultSetInterface
    {
        $this->pdoStmt->execute($params);
        return new PDOResultSet($this->pdoStmt);
    }


    // public function fetch(): \Generator
    // {
    //     $row = $this->pdoStmt->fetch(\PDO::FETCH_ASSOC);
    //     while (false !== $row) {
    //         yield $row;
    //         $row = $this->pdoStmt->fetch(\PDO::FETCH_ASSOC);
    //     }
    // }
}