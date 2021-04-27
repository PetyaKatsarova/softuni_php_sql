
<?php
var_dump(json_decode($_COOKIE['test']));
if(isset($_COOKIE['background-color'])){
    $background = $_COOKIE['background-color'];
    echo "<body bgcolor='$background'>";
    echo "<h1>Hi From Another :)</h1>";
    echo "<a href='third.php'>Third Page</a>";
    echo "</body>";
}
else
{
    echo "<body bgcolor='coral'>";
    echo "<h1>The cookie background-color expired!</h1>";
    echo "<a href='third.php'>Third Page</a>";
    echo "</body>";
}
