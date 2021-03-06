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
    $personName = $line1[$i];
    $personMoney = $line1[$i+1];
    try{
          $people[$personName] = new Person($personName, $personMoney);
          // var_dump($people[$personName]);
    }catch(Exception $ex){
        echo $ex->getMessage();
        return;
    }
}
// make 1 str from line2 and again split into single words array:
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
    $product = new Product($productName, $productCost);
    $products[$productName] = $product;
}

foreach($line3 as $el){
    if($el === 'END') break;
    $bla = explode(' ', $el);   

    for($i=0; $i<count($bla)-1; $i+=2){
        $personName = $bla[$i];
        $productName = $bla[$i+1];
        // process line3: $line3 = ['Pesho Bread', 'Gosho Milk', 'Gosho Milk','Pesho Milk','END'];
        if(array_key_exists($productName, $products) && array_key_exists($personName, $people)){
           /** @var Person $person */
            $person = $people[$personName];
            try{
                $person->buyProduct($products[$productName]);
            }catch(Exception $ex){
                echo $ex->getMessage();;
            }
            // $people[$personName]->buyProduct($products[$productName]);

        }
    }
}

foreach($people as $person){
    echo $person;
    // if(count($person->getProducts()) === 0){
    //     echo $person->getName() . " - Nothing bought<br/>";
    // }
    // echo $person->getName() . ' - ';
    // $output = '';
    // // echo implode(',', $person->getProducts()) . "<br/>";
    // foreach($person->getProducts() as $product){
    //     $output .= $product->getName() . ',';
    // }
    // echo substr($output,0,strrpos($output, ',')) . "<br/>";
}



// Create two classes: class Person and class Product. Each person should have a name, money and a bag of products.Each product should have name and cost. Name cannot be an empty string. Money cannot be a negative number.Create a program in which each command corresponds to a person buying a product: If the person can afford a product add it to his bag.
//  If a person doesn’t have enough money, print an appropriate message ('[Person name] cant afford[Product name]').On the first two lines you are given all people and all products. Next you will be given all purchases people made until END is reached. Print a message when someone makes a purchase. After all purchases print every person in the order of appearance and all products that he has bought also in order of appearance. If nothing is bought, print
// the name of the person followed by 'Nothing bought'.In case of invalid input (negative money exception message: 'Money cannot be negative') or empty name:(empty name exception message 'Name cannot be empty') break the program with an appropriate message. See
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