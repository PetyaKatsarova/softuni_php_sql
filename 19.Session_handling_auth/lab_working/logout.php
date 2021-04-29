<?php
session_start();
unset($_SESSION['logged_in_user']);
session_destroy();
echo "<a href=sessions.php>login</a>";