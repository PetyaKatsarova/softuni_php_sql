<?php

use Database\DatabaseInterface;
use Database\ORM\QueryBuilderInterface;

class MySQLQueryBuilderInterface implements QueryBuilderInterface
{
    /**
    * @var string
    */
     private $query;
     /**
    * @var DatabaseInterface
    */
     private $db;
    // ?? 
    private $where;

     public function __construct(DatabaseInterface $db)
     {
        $this->db = $db;
        $this->query = '';   
     }
   

    public function select(array $columns=[]): QueryBuilderInterface
    {
       $query = 'SELECT ';
       if (empty($columns)){
           $query .= '*';
       }else{
           $query .= implode(', ', $columns);
       }
       $this->query = $query;
       return $this;
    }
    public function from(string $table): QueryBuilderInterface
    {
        $this->query = ' FROM ' .$table;
        return $this;
    }
    public function where(array $criteria=[]): QueryBuilderInterface
    {
        $query = ' WHERE 1=1';
        foreach(array_keys($criteria) as $column){
            $query .= ' AND ' . $column .' = ?';
        }
        $this->query = $query;
        $this->where = array_values($criteria);
        return $this;
    }
    public function orderBy(array $order)
    {
        $query = ' ORDER BY ';
        foreach ($order as $column=>$criterion){
            $query .= $column . ' ' .$criterion . ', ';
        }
    }
    public function groupBy($columns)
    {

    }
    public function avg($value):string
    {

    }
    public function sum($value):string
    {

    }
    public function min($value):string
    {

    }
    public function max($value):string
    {

    }
    public function build():DatabaseStatement
    {

    }
}