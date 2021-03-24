<?php
  require_once 'Interfaces.php';
// function to loop through a function to require classes, other files
// spl_autoload_register(function($class){
//     require_once $class . ".php";
// });
// no need to mention the function: it does it for you:
    //  spl_autoload_register();

class Citizen implements PersonInterface, IdentifiableInterface, BirthableInterface {
 
    private $name;
    private $age;
    private $id;
    private $birthdate;

    public function __construct(string $name, int $age, string $id, string $birthdate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthdate);
    }
    public function setId(string $id):void{
        $this->id = $id;
     }
    public function setBirthdate(string $birthdate):void{
        $this->birthdate = $birthdate;
    }

    public function setName(string $name):void{
       $this->name = $name;
    }
    public function setAge(int $age):void{
       $this->age = $age;
    }
    public function getName():string{
        return $this->name;
     }
     public function getAge():int{
        return $this->age;
     }
     public function getBirthdate():string{
        return $this->birthdate;
    }
    public function getId():string{
        return $this->id;
    }
    public function __toString()
    {
        return "{$this->getName()}</br/>{$this->getAge()}<br/>{$this->getId()}<br/>{$this->getBirthdate()}";
    }

}

$citizen = new Citizen('Pepi', 102, '730317', '17.03.73');
echo $citizen;
