<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions</title>
</head>
<body>
   <a href="">Ask a new question</a>
   <a href="<?=url("ask_question_php?category_id=$id");?>">Ask new question</a>
   <hr/>
   <?php foreach ($questions as $q){?>
     <div class="question">
        <span><a href="<?=url("question.php?id={$question['id']}")?>"><?= $question['title'];?></a></span>
        <span><?= $question['answers_count'];?></span>
        </br>
        <span><?= $question['author_name'];?></span>
        <span><?= $question['created_on'];?></span>
        <span><?= $question['category_name'];?></span>
     </div>
   <?php }?>
</body>
</html>