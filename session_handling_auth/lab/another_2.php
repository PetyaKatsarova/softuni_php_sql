<?php
// header("Location: http://google.com");
header("Set-Cookie: color=orange");//it is shown in res cookie in network in browser
// $headers = get_headers("http://localhost");
// option 2
$headers = getallheaders();
var_dump($headers);
echo "<h1>welcome from another_2</h1>";
echo "<a href=another.php>another</a>";
exit;
