<?php
require_once 'index.php';
// // require_once 'common.php';
// echo "<form method='post' name='login'>
//         Username: <input type='text' name='username' />
//         Password: <input type='text' name='password' />
//       </form>";

 $error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $userService = new \Services\Users\UserService(
        new \Repositories\Users\UserRepository($db),
        new \Services\Encryption\MnogoTypEncryptioService()
    );

    if ($userService->verifyCredentials($username, $password)) {
        // $user = $userService->findByUsername($username);
        // $_SESSION['id'] = $user->getId();
        // header("Location: profile.php");
        echo 'Successfully logged in.';
    } else {
        $error = 'Sorry, dude: Invalid username or password';
    }
}

require_once 'views/users/login.php';