<?php /**@VAR \App\Data\UserDTO $data*/?>
<h1>Your profile</h1>
<form method="POST">
    <label>
        Username: 
        <input type="text" value="<?= $data->getUsername(); ?>" name="username" />
    </label>
    <label>
        Password: 
        <input type="text" name="PASSWORD" />
    </label>
    Birthday: <label>
        <input type="text" value="<?= $data->getBorn_on(); ?>" name="born_on" />
    </label><br/>
    <inut type="submit" name="edit" value="Edit!" />
</form>
<a href="logout.php">Logout</a>
<br/>
<a href="users.php">All Users</a>