<?php
namespace ExerciseDatabase;

class ExecuteStatement implements ExecuteStatementInterface
{
    private $pdoStatement;
    
    // build-in php class on which fetch and execute methods can be used
    public function __construct(\PDOStatement $pdoStatement)
    {
        $this->pdoStatement = $pdoStatement;
    }

    // ???? pdoStatment->execute is the build in function, this is not recursion
    // but why do we do it sooo comlicated??
    public function execute(array $param = []):FetchResultSetInterface
    {
        $this->pdoStatement->execute($param);
        return new FetchResultSet($this->pdoStatement);
    }
}

