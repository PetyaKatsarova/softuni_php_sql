<?php
// for url func
require_once 'common.php';
if(!isset($_GET['id'])){
    header("Location: " . url("categories.php"));
    exit;
}
$id = $_GET['id'];

require_once 'db/question_queries.php';
require_once 'db/answer_queries.php';

$question = getQuestionById($db,$id);
$answers = getAnswersByQuestionId($db, $id);
var_dump($question, $answers);

if (isset($_POST['answer'])){
    $body = $_POST['body'];
    answer($db,$id,$userId, $body);
}

require_once 'templates/question.php';