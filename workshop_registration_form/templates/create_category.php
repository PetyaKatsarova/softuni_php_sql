<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create Category</title>
    </head>
    <body>
        <?php include_once 'logged_in_header.php' ?> | 

        <a href="<?=url("categories.php"); ?>">Back to categories</a>
        <br><br>
        <form method="post">
            Name<input type="text" name="name"/><br/>
            <input type="submit" value="Create!" />
        </form>
    </body>
</html>




       