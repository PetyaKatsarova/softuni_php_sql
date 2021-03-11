<?php
class Trainer{
    /** * @var string */
    private $name;
    /** * @var int */
    private $badges;
    /** * @var Pokemon[][] */
    private $pokemons;

    public function __construct($n)
    {
        $this->name = $n;
        $this->badges = 0;
        $this->pokemons = [];
    }
    public function getBadges(){
        return $this->badges;
    }

    public function catchPokemon(Pokemon $pokemon):void{
        $this->pokemons[$pokemon->getElement()][] = $pokemon;
    }
    public function receiveBadge():void{
        $this->badges++;
    }
    public function hasPokemonsByElement(string $element):bool{
        return key_exists($element,$this->pokemons)&&count($this->pokemons[$element]) > 0;
    }
    public function hitPokemons(int $dmg): void{
        foreach($this->pokemons as $type=>$pokemonsByType){
            foreach($pokemonsByType as $key=>$pokemon){
                $pokemon->hit($dmg);
                if(!$pokemon->isAlive()){
                    unset($this->pokemons[$type][$key]);
                }
            }
        }
    }
    public function __toString()
    {
        $pokemonCount = 0;
        foreach($this->pokemons as $pokemonsByType){
            $pokemonCount += count($pokemonsByType);
        }
        return $this->name . ' ' . $this->badges . ' ' . $pokemonCount;
    }
}

class Pokemon{
    /** @var string */
    private $name;
    /** @var string */
    private $element;
    /** @var int */
    private $health;

    public function __construct($name, $el, $h){
        $this->name = $name;
        $this->element = $el;
        $this->health = $h;
    }
    public function getName():string{
        return $this->name;
    }
    public function getElement():string{
        return $this->element;
    }
    public function getHealth():int{
        return $this->health;
    }
    public function isAlive():bool{
        return $this->getHealth() > 0;
    }
    public function hit(int $dmg):void{
        $this->health -= max(0, $dmg);
    }
}
$arr = ['Stamat', 'Blast', 'Water', 18,'Nasko', 'Pikachu', 'Electricity', 22,'Jicat', 'Sth', 'Psychic', 90,'Tournament', 'Fire', 'Electricity', 'Fire', 'End'];
$trainers = [];
//  $line = readline();
// for($i=0; $i<count($arr); $i+=4){
//     if($arr[$i] == 'Tournament') break;
//     $trainerName = $arr[$i];
//     $pokemonName = $arr[$i+1];
//     $element = $arr[$i+2];
//     $health = $arr[$i+3];
//     if(!key_exists($trainerName, $trainers)){
//         $trainers[$trainerName] = new Trainer($trainerName);
//     }
//     $trainer = $trainers[$trainerName];
//     $trainer->catchPokemon(new Pokemon($pokemonName, $element, $health));
//     // var_dump($trainers);
// }
$arr2;
for($i=0; $i<count($arr); $i++){
   if($arr[$i] == 'Tournament'){
       echo 'Tournament breaking out;';
       break;
   }
   $removed = array_shift($arr);
}
 var_dump($arr);

// // $Line = readline();
// for($i=0; $i<count($arr); $i++){
//     if($arr[$i] == 'End') break;
//     foreach($trainers as $trainer){
//         if($trainer->hasPokemonsByElement($$arr[$i])){
//             $trainer->receiveBadge();
//         }else{
//             $trainer->hitPokemons(dmg:10);
//         }
//     }
// }

// uksort($trainers, function($k1,$k2) use ($trainers){
//     $trainer1 = $trainers[$k1];
//     $trainer2 = $trainers[$k2];
//     return $trainer2->getBadges() <=> $trainer1->getBadges();
// });
// echo implode(PHP_EOL, $trainers);

// Nasko 1 1
//Stamat 0 0
//Jicat 0 1

// TrainerName PokemonName PokemonElement PokemonHealth”, after command 'tournament': 1 of 3 els: 'fire, water, electricity till 'End': check if at least 1 trainer has a pokemon with this element

// Define a class
// Trainer and a class Pokemon. Trainers have a name, number of badges and a collection of pokemon, Pokemon
// have a name, an element and health, all values are mandatory. Every Trainer starts with 0 badges.
// From the console you will receive an unknown number of lines until you receive the command “Tournament”, each
// line will carry information about a pokemon and the trainer who caught it in the format “TrainerName,PokemonName, PokemonElement, PokemonHealth” where TrainerName is the name of the Trainer who
// caught the pokemon, names are unique there cannot be 2 trainers with the same name. After receiving the
// command “Tournament” an unknown number of lines containing one of three elements “Fire”, “Water”,
// “Electricity” will follow until the command “End” is received. For every command you must check if a trainer has
// atleast 1 pokemon with the given element, if he does he receives 1 badge, otherwise all his pokemon lose 10 health,
// if a pokemon falls to 0 or less health he dies and must be deleted from the trainer’s collection. After the command
// “End” is received you should print all trainers sorted by the amount of badges they have in descending order (if
// two trainers have the same amount of badges they should be sorted by order of appearance in the input) in the
// format “&lt;TrainerName&gt; &lt;Badges&gt; &lt;NumberOfPokemon&gt;”.
