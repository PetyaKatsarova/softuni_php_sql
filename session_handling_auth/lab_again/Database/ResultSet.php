<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 10/26/2018
 * Time: 10:48
 */

namespace Database;

use Generator;

class ResultSet implements ResultSetInterface
{
    /**
     * @var \PDOStatement
     */
    private $pdoStatement;

    public function __construct(\PDOStatement $PDOStatement)
    {
        $this->pdoStatement = $PDOStatement;
    }

    public function fetch($className) : \Generator
    {
        while ($row = $this->pdoStatement->fetchObject($className)){
            yield $row;
        }
    }
    // no application: only to remove the red line on the class
    public function fetchAll($className): Generator
    {
        return yield;
    }
}