<?ask_question_php
require_once 'common.php';

if(!hasRole($db, $userId, 'ADMIN')){
    header("location: " .url("logout.php"));
}

if(isset($_POST['NAME'])){
    $name = $_POST['name'];
    require_once 'db/category_queries.php';
    createCategory($dv, $name);
    header("Location: " .url("categories.php"));

    require_once 'templates/create_category.php';
}