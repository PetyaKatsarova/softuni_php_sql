<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question</title>
</head>
<body>
     <div class="question">
        <span>
            Title:
            <?= $question['title'];?>
        </span>
        <br/>
        <span>
            <?= $question['body'];?>
        </span>
        </br>
        Asked by:
        <span><?= $question['author_name'];?></span>
        <span><?= $question['created_on'];?></span>
        <span><?= $question['category_name'];?></span>
     </div>
     <hr/>
     <?php foreach($answers as $answer){ ?>
       <div>by: <?=$answer['author_name']; ?></div>
       <div><?=$answer['body']; ?></div>
     <?php }?>
     <form method="post">
       Answer here: 
       <textarea name="body"></textarea>
       <input type="submit" value="Answer!" name="answer" />
     </form>
</body>
</html>