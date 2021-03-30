<?php
// header("Location: http://google.com");
header("Set-Cookie: font-style=italic");//it is shown in res cookie in network in browser
// $headers = get_headers("http://localhost");
// option 2
$headers = getallheaders();
var_dump($headers);
echo "<h1>welcome from page 3</h1>";
echo "<a href='index.php' color=green>back to index</a>";
exit;
