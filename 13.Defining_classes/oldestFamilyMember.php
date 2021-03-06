<?php
class Person{
    private $name;
    private $age;

    public function __construct(string $n, int $a)
    {
        $this->name = $n;
        $this->age = $a;
    }
    public function getName():string{
        return $this->name;
    }
    public function getAge():int{
        return $this->age;
    }
}

class Family{
    /**var @Person[]*/
    private $members;
    /***var @Person */
    private $oldestMember;

    public function __construct()
    {
        $this->members = [];
        $this->oldestMember = null;
    }
    public function addMember(Person $person):void{
        if(null === $this->oldestMember || $this->oldestMember->getAge() < $person->getAge()){
            $this->oldestMember = $person;
        }
        $this->members[] = $person;
    }
    public function getOldestMember(){
        return $this->oldestMember;
    }
}
$p1 = new Person('Gosho', 25);
$p2 = new Person('Pesho', 55);
$p3 = new Person('Niam', 5);
$personsArr = Array($p1, $p2, $p3);
$family = new Family();

for($i=0; $i<count($personsArr); $i++){
    $family->addMember($personsArr[$i]);
}
// i dont know why it is underlined but works
if(null !== $family->getOldestMember()){
    echo $family->getOldestMember()->getName() . ' is ' . $family->getOldestMember()->getAge() . ' years old.';
}else{
    echo 'There is no oldest member.';
}
