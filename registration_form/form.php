<!DOCTYPE html>
<html lang="en">
<head> 
   <meta charset="UTF-8">
   <title> Registration form</title>
   <!-- <link -->
</head>
    <body>
        <form method="post">
        Username: <input type="text" value="<?php $username ?>" name="username" /><br>
        Password: <input type="<?php !empty($password) ? 'text':'password'; ?>" value="<?php $password;?>" name="password" /><br>
        <input type="submit" />
        </form>
        <div id="response">
          <?php $response; echo 'working...' ?>
        </div>
    </body>
</html>