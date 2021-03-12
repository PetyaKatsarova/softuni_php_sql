<?php 
class Person{
    private  $name;
    /** @var float*/
    private $money;
    /** @var Product[] | array*/
    private $products;

    public function __construct($name, $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
    }
    private function setName($n):void{
        if(empty($name)){
            throw new Exception("name cannot be empty.");
        }
        $this->name = $n;
    }
    private function setMoney(float $m){
        if($m<0){
            throw new Exception('Money cannot be negative.');
        }
        $this->money = $m;
    }
    public function getMoney():float{
        return $this->money;
    }
    // setter for products
    public function addProduct(Product $product):void{
        $this->products[] = $product;
    }
    public function buyProduct(Product $product){
        $product->
    }
}
// Create two classes: class Person and class Product. Each person should have a name, money and a bag of products.Each product should have name and cost. Name cannot be an empty string. Money cannot be a negative number.Create a program in which each command corresponds to a person buying a product: If the person can afford a product add it to his bag.
//  If a person doesn’t have enough money, print an appropriate message (&quot;[Person name] can&#39;t afford[Product name]&quot;).On the first two lines you are given all people and all products. Next you will be given all purchases people madeuntil END is reached. Print a message when someone makes a purchase. After all purchases print every person inthe order of appearance and all products that he has bought also in order of appearance. If nothing is bought, print
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
// Pesho can&#39;t afford Milk
// Pesho - Bread
// Gosho - Milk,Milk

// Mimi=0;
// Kafence=2;
// Mimi Kafence
// END

// Mimi can&#39;t afford Kafence
// Mimi – Nothing bought

// Jeko=-3;
// Chushki=1;
// Jeko Chushki

// Money cannot be negative