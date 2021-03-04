<?php
 require_once 'common.php';
 $categoryId = 1;
 if(isset($_GET['category_id'])){
     $categoryId = (int)$_GET['category_id'];
 }

 require_once 'db/category_queries.php';
 require_once 'db/tags_queries.php';

 $categories = getAllCategories($db);
 $tags = getAllTags($db);
 // doesnt work
 var_dump($categories);

 if(isset($_POST['title'], $_POST['body'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $category = (int)$_POST['category'];
    $existingTags = isset($_POST['existing_tags']) ? $_POST['existing_tags'] : [];
    $newTags = explode(',', $_POST['new_tags']);

    // for the createQuestion func
    require_once 'db/question_queries.php';

    $result = createQuestion($db, $userId=8, $title, $body, $category, $existingTags, $newTags);
    //var_dump($result);
    if($result){
        header("Location: " . url("question.php?id=$result"));
        exit;
    }
 }
 echo 'proba123';
 require_once 'templates/ask_question.php';