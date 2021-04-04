<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
    <h1>Registration form</h1>
    <div id="error" style="color:red">
        <h1><?=$error;?></h1>
    </div>
    <form method="post">
        Username: <input type="text" name="username">
        Password: <input type="password" name="password">
        Confirm password:<input type="password" name="confirm"><br/>
        <input type="submit" name="register" value="Register!"/>
    </form>
    </body>
</html>