<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions </title>
</head>
<body>
<a href="<?=url("category.php?id={$_GET['category_id']}"); ?>">Back to questions in this category</a>

  <form method="post">
     Title<input type="text" name="title"/><br/>
     Question: <br/>
     <textarea rows='7' cols='30' name="body"></textarea><br/>
     Category:
     <select name="category">
     <option value='bla'>Programming</option>
     </select>
     <br/><br>
     Tags: 
     <select multiple="multiple" name="existing_tags[]">
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




       