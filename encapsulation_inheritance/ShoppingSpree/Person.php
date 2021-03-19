<?php 
class Person{
    /** @var string */
    private  $name;
    /** @var float*/
    private $money;
    /** @var Product[] | array*/
    private $products;

    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
    }
    private function setName($name):void{
        if(empty($name)){
            throw new Exception("name cannot be empty.");
        }
        $this->name = $name;
    }
    public function getName():string{
        return $this->name;
    }
    private function setMoney(float $money){
        if($money<0){
            throw new Exception('Money cannot be negative.');
        }
        $this->money = $money;
    }
    public function getMoney():float{
        return $this->money;
    }
    // setter for products
    public function addProduct(Product $product):void{
        $this->products[] = $product;
    }
    public function getProducts(){
        return $this->products;
    }
    private function cantAffordProduct(Product $product):bool{
        return $product->getCost() > $this->getMoney();
    }
    public function buyProduct(Product $product){
        if($this->cantAffordProduct($product)){
            throw new Exception(message: "{$this->getName()} can't affort {$product->getName()}<br/>");
            // !!!!!!!!!!!!!! when i use try-catch in the class instance and $ex->getMessage()will give me this message!!!!!!!!!!!!!!!!!!!! 
           }else{
            $this->setMoney($this->getMoney() - $product->getCost());
            // $this->products[] = $product;
            $this->addProduct($product);
            echo "{$this->getName()} bought {$product->getName()}<br/>";
       }
    }
    public function __toString()
    {
        return count($this->getProducts()) === 0 ? 
            $this->getName() . " - Nothing bought<br/>" : 
            $this->getName() . ' - ' .implode(',',
                   array_map(function(Product $product){
                       return $product->getName();
                   }, 
                    $this->getProducts())) . "<br/>";
        // another solution
        if(count($this->getProducts()) === 0){
            return $this->getName() . " - Nothing bought<br/>";
        }
        return  $this->getName() . ' - ' .implode(',',
                   array_map(function(Product $product){
                       return $product->getName();
                   }, 
                    $this->getProducts())) . "<br/>";
        // another solution

        // foreach($this->getProducts() as $product){
        //     $output .= $product->getName() . ',';
        // }
        // return substr($output,0,strrpos($output, ',')) . "<br/>";
    }
}
