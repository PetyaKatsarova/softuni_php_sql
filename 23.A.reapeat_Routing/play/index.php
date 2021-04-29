<?php
echo "hi from php <br/>";

// big str includes small string==strstr()
// .htaccess was set to always redirect to index.php whatever url path you type: so, we can add any words in the url and then use it for us
if(strstr($_SERVER['REQUEST_URI'], '/users/pesho')){
    require_once 'pesho.php';
}