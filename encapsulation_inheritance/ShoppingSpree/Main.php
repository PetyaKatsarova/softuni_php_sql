<?php
require_once 'Product.php';
require_once 'Person.php';

$arr2 = ['Bread=10;Milk=2;',
'Pesho Bread',
'Gosho Milk',
'Gosho Milk',
'Pesho Milk',
'END'
];
$arr1 = ['Pesho=11;','Gosho=4;'];
$result = [];
 for($i=0; $i<count($arr1); $i++){
     $arr1[$i] = preg_split("/[=;]/", $arr1[$i], limit:-1);
    //  $result[] = array_filter($arr[$i], function ($el){
    //      return $el !== '';
    //  });
    // $result[] = preg_split("/[=;]/", $arr1[$i], limit:-1, flags: PREG_SPLIT_NO_EMPTY);
   // $result[] = explode('=', $arr1[$i]);
   $arr1[$i] = implode(' ', $arr1[$i]);
     echo gettype($arr1[$i]) . "<br/>";
 };
// print_r($result);
 $people = [];
// for($i=0; $i<count($result[0])-1; $i+=2){
//     $personName = $result[0][$i];
//     $personMoney = $result[0][$i+1];
//     echo $personName;
//     try{
//          $people[$personName] = new Person($personName, $personMoney);
//     }catch(Exception $ex){
//         echo $ex->getMessage();
//     }
  
// }
// print_r($people);
 // CONST PREG_SPLIT_NO_EMPTY
// foreach($arr2 as $line){
//     if($line !== ''){
//         $result[] = $line;
//     }
// }



// Create two classes: class Person and class Product. Each person should have a name, money and a bag of products.Each product should have name and cost. Name cannot be an empty string. Money cannot be a negative number.Create a program in which each command corresponds to a person buying a product: If the person can afford a product add it to his bag.
//  If a person doesn’t have enough money, print an appropriate message (&quot;[Person name] can&#39;t afford[Product name]&quot;).On the first two lines you are given all people and all products. Next you will be given all purchases people made until END is reached. Print a message when someone makes a purchase. After all purchases print every person inthe order of appearance and all products that he has bought also in order of appearance. If nothing is bought, print
// the name of the person followed by &quot;Nothing bought&quot;.In case of invalid input (negative money exception message: &quot;Money cannot be negative&quot;) or empty name:(empty name exception message &quot;Name cannot be empty&quot;) break the program with an appropriate message. See
// the examples below:
// Input Output
// Pesho=11;Gosho=4;
// Bread=10;Milk=2;
// Pesho Bread
// Gosho Milk
// Gosho Milk
// Pesho Milk
// END

// Pesho bought Bread
// Gosho bought Milk
// Gosho bought Milk
// Pesho cant afford Milk
// Pesho - Bread
// Gosho - Milk,Milk

// Mimi=0;
// Kafence=2;
// Mimi Kafence
// END

// Mimi cant afford Kafence
// Mimi – Nothing bought

// Jeko=-3;
// Chushki=1;
// Jeko Chushki

// Money cannot be negative



// explained preg_split() func
// $date = "1970-01-01 00:00:00";
// $pattern = "/[-\s:]/";
// $components = preg_split($pattern, $date);
// print_r($components);
// Array ( [0] => 1970 [1] => 01 [2] => 01 [3] => 00 [4] => 00 [5] => 00 )