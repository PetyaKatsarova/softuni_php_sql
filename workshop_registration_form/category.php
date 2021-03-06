<?php
require_once 'common.php';
if(!isset($_GET['id'])){
   header("Location: categories.php");
   exit;
} 
$id = $_GET['id'];
echo $id . 'from category.php $id';
// if(isset($_GET['id'])){
//    $id = $_GET['id'];
// }else{
//    $id = 999;
// }
require_once 'db/category_queries.php';
// doesnt work
var_dump(getQuestionsByCategoryId($db,$id));
$questions = getQuestionsByCategoryId($db,$id);
require_once 'templates/questions_by_category.php';