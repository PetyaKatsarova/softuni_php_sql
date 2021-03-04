<?php
require_once 'common.php';
if(!isset($_GET['id'])){
   header("Location: categories.php");
   exit;
} 
$id = $_GET['id'];
require_once 'db/category_queries.php';
// doesnt work
echo 'getQuestionsByCategoryId(db,id) result: ';
var_dump(getQuestionsByCategoryId($db,$id));
$questions = getQuestionsByCategoryId($db,$id);
require_once 'templates/questions_by_category.php';