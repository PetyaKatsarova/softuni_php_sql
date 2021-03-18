<?php
require_once 'Product.php';
require_once 'Person.php';

$line1 = 'Pesho=11;Gosho=4;';
$line2 = ['Bread=10;Milk=2;'];
$line3 = ['Pesho Bread', 'Gosho Milk', 'Gosho Milk','Pesho Milk','END'];
$line1 = preg_split("/[=;]/", $line1, limit:-1);
// returns array splitting the str: removing = and ; 
$line1 = array_filter($line1, function ($el){
           return $el !== '';
       });
// removes empty str: ""

 $people = [];
for($i=0; $i<count($line1)-1; $i+=2){
    $personName = $line1[$i] . "<br/>";
    $personMoney = $line1[$i+1];
    // echo $personName . "<br/>";
    try{
          $people[$personName] = new Person($personName, $personMoney);
          // var_dump($people[$personName]);
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
}
// make 1 str from line3 and again split into single words array:
$line2 = preg_split("/[=;]/", implode("", $line2), limit:-1);
// returns array splitting the str: removing = and ; 
$line2 = array_filter($line2, function ($el){
           return $el !== '';
        });
        // var_dump($line2);
 $products = [];
for($i=0; $i<count($line2)-1;$i+=2){
    $productName = $line2[$i];
    $productCost = $line2[$i+1];
      echo $productName . "<br/>";
      echo $productCost. "<br/><br/>";
      $bla = new Product($productName, $productCost);
     $products[$productName] = $bla;
    //  var_dump($products[$productName]);
}
 var_dump($products);



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