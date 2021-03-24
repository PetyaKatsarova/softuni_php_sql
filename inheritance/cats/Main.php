<?php
spl_autoload_register(function($class){
    require_once $class . ".php";
});

$streetCat = new Streetcat('Ginka', 'streetcat', 50);
echo $streetCat;

// using constants and not nums in the code:
// const INPUT_END_COMMAND = "End";
// while($input != self::INPUT_END_COMMAND){
//     $input = readline();
// }