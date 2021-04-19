<?php
class User
{
    /**
    * @var string
    */
   private $id;
   private $username;
   private $password;
   /**
    * @var Question[]
    */
    private $questions;
      /**
    * @var Answer[]
    */
    private $answers;

    // public function __construct(int $id, string $username, string $password, array $questions, array $answers)
    // {
    //     $this->id = $id;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->questions = $questions;
    //     $this->answers = $answers;
    // }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getQuestions(){
        return $this->questions;
    }
    public function setQuestions($questions){
        $this->questions = $questions;
    }
    public function getAnswers(){
        return $this->answers;
    }
    public function setAnswers($answers){
        $this->answers = $answers;
    }
} 