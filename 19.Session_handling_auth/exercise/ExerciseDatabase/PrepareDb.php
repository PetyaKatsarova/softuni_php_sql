<?php
namespace ExerciseDatabase;

use ExerciseDatabase\PrepareDbInterface;
use ExerciseDatabase\ExecuteStatementInterface;
// interface prepareDbInterface{
//     public function query(string $query):ExecuteStatementInterface;
// }
class prepareDb implements PrepareDbInterface
{
    private $pdo;
    // what is the type of pdo?
    public function __construct(\PDO $PDO)
    {
        $this->pdo = $PDO;
    }
    // takes in query and returns a stmt, which is pdo->prepare()
    // !!! NEVER RETURN INSIDE THE FUNCTION INTERFACE: ONLY IN THE TITLE
    public function query(string $query):ExecuteStatementInterface
    {
        $stmt = $this->pdo->prepare($query);
        return new ExecuteStatement($stmt);
    }
}
