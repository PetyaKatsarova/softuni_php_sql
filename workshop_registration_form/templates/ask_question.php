<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions</title>
</head>
<body>
<?php include_once 'logged_in_header.php' ?> | 
<a href="<?=url("category.php?id={$_GET['category_id']}"); ?>">Back to questions in this category and kuku lala</a>
<br><br>
  <form method="post">
     Title<input type="text" name="title"/><br/>
     Question: <br/>
     <textarea rows='7' cols='30' name="body"></textarea><br/>
     Category:
     <select name="category">
        <?php foreach($categories as $category){ ?>
            <option value="<?=$category['id'];?>">
                <?=$category['name']?>(<?=$category['questions_count'] ?>)
            </option>
        <?php }?>
     </select>
     <br/><br>
     Tags: 
     <select multiple name="existing_tags[]" id="existing_tags">
        <?php foreach($tags as $tag){ ?>
            <option value="<?=$tag['id'];?>">
                <?=$tag['name']?>(<?=$category['questions_count'] ?>)
            </option>
        <?php }?>
     </select><br/>
     Add tags: <input type="text" name="new_tags" placeholder="Enter your tags separated by coma..." /><br/>
     <input type="submit" value="Ask!" />
  </form>
</body>
</html>




       