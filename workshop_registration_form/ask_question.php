<?php
 require_once 'common.php';
 $categoryId = 1;
 if(isset($_GET['category_id'])){
     $categoryId = (int)$_GET['category_id'];
 }

 require_once 'db/category_queries.php';
 $categories = getAllCategories($db);

 require_once 'templates/ask_question.php';