<?php
 require_once 'common.php';
 require_once 'db/category_queries.php';
 require_once 'db/tags_queries.php';

 $categoryId = 1;
 if(isset($_GET['category_id'])){
     $categoryId = (int)$_GET['category_id'];
 }

 $categories = getAllCategories($db);
 $tags = getAllTags($db);
 // sth is wrong: shows 0
 var_dump($tags);

 if(isset($_POST['title'], $_POST['body'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    // this is for category_id
    $category = (int)$_POST['category'];
    $existingTags = isset($_POST['existing_tags']) ? $_POST['existing_tags'] : [];
    $newTags = explode(',', $_POST['new_tags']);

    // for the createQuestion func
    require_once 'db/question_queries.php';

    $result = createQuestion($db, $userId, $title, $body, $category, $existingTags, $newTags);
    //var_dump($result);
    if($result){
        header("Location: " . url("question.php?id=$result"));
        exit;
    }
 }
 echo 'proba123';
 require_once 'templates/ask_question.php';