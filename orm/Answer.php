<?php
class Answer
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var Question
     */
    private $question;
    /**
     * @var string
     */
    private $body;
    /**
     * @var User
     */
    private $author;
     
    public function __construct(int $id, Question $q, string $body,User $author)
    {
        $this->id = $id;
        $this->question = $q;
        $this->body = $body;
        $this->author = $author;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getQuestion(){
        return $this->question;
    }
    public function setQuestion($question){
        $this->question = $question;
    }
    public function getBody(){
        return $this->body;
    }
    public function setBody($body){
        $this->body = $body;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
}