<?php
// gets all php files from this dir
spl_autoload_register();

$myCat = CatFactory::create('Sisi', 'Streetcat', 4);
echo $myCat;



// spl_autoload_register(function($class){
//     require_once $class . ".php";
// });
// class Main{
    // array of Cats
        // private $cats;
        // using constants and not nums in the code:
    // const INPUT_END_COMMAND = "End";
    
    // while($input != self::INPUT_END_COMMAND){
    
    //     $data = preg_split("/\\s+/", $input, limit: -1, flags: PREG_SPLIT_NO_EMPTY);  
    
    //     $input = readline();
    // }
    
    // $this->cats[$name] = CatFactory::create($name,$breed, $param);
    // }
