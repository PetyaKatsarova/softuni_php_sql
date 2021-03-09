<!-- Write a class Number that will hold an integer number. Write a method in the class that returns the English name of the last digit of the given number. Write a program that reads an integer and prints the returned value from this method.
Examples:  Input Output Input Output
            1024  four   512   two -->

<?php
class Number{
    private int $num;

    public function __construct($n)
    {
        $this->num = $n;
    }

    public function returnLastDigit(){
        $nums = ['zero', 'one','two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];
        $lastDigit = $this->num % 10;
        for($i=0; $i<count($nums); $i++){
            if($i == $lastDigit){
                echo $nums[$i];
            }
        }
    }
}
$bla = new Number(129);
$bla->returnLastDigit();