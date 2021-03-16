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
    private function cantAffordProduct(Product $product):bool{
        return $product->getCost() > $this->getMoney();
    }
    public function buyProduct(Product $product){
        if($this->cantAffordProduct($product)){
             throw new Exception(message: "{$this->getName} can't affort {$product->getName()}<br/>");
        }
        $this->setMoney($this->getMoney() - $product->getCost());
        $this->products[] = $product;
        //  $this->addProduct($product);
        echo "{$this->getName()} bought {$product->getName()}";
    }
}
