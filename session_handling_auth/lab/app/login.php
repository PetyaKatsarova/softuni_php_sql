<?php
// require_once 'index.php';
// require_once 'common.php';
require_once 'secure_common.php';

// var_dump($_SERVER);
// exit;

 $error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $userService = new \Services\Users\UserService(
        new \Repositories\Users\UserRepository($db),
        new \Services\Encryption\MnogoTypEncryptioService()
    );
    // var_dump($userService->verifyCredentials($username, $password));

    if ($userService->verifyCredentials($username, $password)) {
        $user = $userService->findByUsername($username);
        $_SESSION['id'] = $user->getId();
        header("Location: profile.php");
        echo 'Successfully logged in.';
    } else {
        $error = 'Sorry, dude: Invalid username or password';
    }
}

require_once 'views/users/login.php';