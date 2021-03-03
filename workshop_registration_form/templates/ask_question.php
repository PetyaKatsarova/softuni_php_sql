<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions </title>
</head>
<body>
  <form method="post">
     Title<input type="text" name="title"/><br/>
     Question: <br/>
     <textarea name="body"></textarea><br/>
     Category:
     <select name="category">
        <?php foreach($categories as $category){ ?>
            <option value="<?php $category['id']; ?>"><?php $category['name']?></option>
        <?php }?>
     </select>
     <br/>
     Tags: 
     <select multiple="multiple" name="existing_tags">
         <option value="1">Test tag</option>
     </select><br/>
     Add tags: <input type="text" name="new_tags" placeholder="Enter your tags separated by coma..." /><br/>
     <input type="submit" value="Ask!" />
  </form>
</body>
</html>