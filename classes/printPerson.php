<!-- Create a class Person. Every person should have name, age and occupation. Your task is to create the class and read
some people, while adding them to an array. Sort them by age and print them in the given format. -->
<?php
class Person{
    private $name;
    private $age;
    private $occupation;

    public function __construct(string $n, int $a, string $occ){
        $this->name = $n;
        $this->age = $a;
        $this->occupation = $occ;
    }

    public function getName():string{
        return $this->name;
    }
    public function getAge():int{
        return $this->age;
    }
    public function getOccupation():string{
        return $this->occupation;
    }

    // Mimi - age: 13, occupation: Student
    public function __toString():string
    {
        return "{$this->name} - age: {$this->age}, occupation: {$this->occupation}";
    }
}

$arr = ['Gosho', '22', 'Dentist', 'Mimi', '13', 'Student', 'END'];
$people = [];

for($i=0; $i<count($arr); $i+=3){
    if($arr[$i] === 'END'){
        break;
    }
    $name = $arr[$i];
    $age = intval($arr[$i+1]);
    $occupation = $arr[$i+2];

    $person = new Person($name, $age, $occupation);
    $people[] = $person;  
}

// sort by age asc
usort($people, function(Person $p1, Person $p2){
    return $p1->getAge() <=> $p2->getAge();
});
foreach($people as $person){
    echo $person->__toString() . "<br/>";  
}