<?php
class Question
{
   private $id;
   private $title;
   private $body;
   /**
    * @var DateTime
    */
   private $createdOn;
   /**
    * @var User
    */
   private $author;
   /**
    * @var Answer[]
    */
   private $answers;

   public function __construct(int $id,string $title, string $body, DateTime $createdOn, User $author, array $answers)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->createdOn = $createdOn;
        $this->body = $body;
        $this->author = $author;
        $this->answers = $answers;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getBody(){
        return $this->body;
    }
    public function setBody($body){
        $this->body = $body;
    }
    public function getCreatedOn(){
        return $this->createdOn;
    }
    public function setCreatedOn($createdOn){
        $this->createdOn = $createdOn;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function getAnswers(){
        return $this->answers;
    }
    public function setAnswers($answers){
        $this->answers = $answers;
    }
}