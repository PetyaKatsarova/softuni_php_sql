<?php
require_once 'common.php';
//echo $userId;
require_once 'db/category_queries.php';

$categories = getAllCategories($db);
var_dump($categories);

require_once 'templates/categories_list.php';