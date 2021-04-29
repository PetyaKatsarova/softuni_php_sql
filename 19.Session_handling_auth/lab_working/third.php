<?php
// header("Location: http://google.com");
header("Set-Cookie: font-style=italic");//it is shown in res cookie in network in browser
// $headers = get_headers("http://localhost");
// option 2
$headers = getallheaders();
var_dump($headers);
echo "<h1>welcome from page 3</h1>";
echo "<a href=indx.php style='color:green'>back to index</a><br/><br/>";
// echo "<a href=logout.php>logout</a>";
// exit;
echo "<script>
    if(4<5){
        // client side: can be changed in the browser, php session can't: kept cookie on the browser
        localStorage.setItem('name', 'Peshko');
        sessionStorage.setItem('age', 51);
    }else{
        console.log('impossible');
    }
    console.log('tvoeto ime e: ' + localStorage.getItem('name'));
    </script>";

