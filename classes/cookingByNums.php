<?php

function solve($num, $arr){
    $result = [];
    $num = intval($num);
    for($i=0; $i<count($arr); $i++){
       //   chop – divide the number by two
       if($arr[$i] == 'chop'){
            $num = $num / 2;
            echo $num . "<br/>";
        //  dice – square root of number
       }else if($arr[$i] == 'dice'){
           $num = sqrt($num);
           echo $num . "<br/>";
        // spice – add 1 to number
       }else if($arr[$i] == 'spice'){
           $num++;
           echo $num . "<br/>";
        // bake – multiply number by 3
       }else if($arr[$i] == 'bake'){
           $num *= 3;
           echo $num . "<br/>";
        //  fillet – subtract 20% from number
       }else if($arr[$i] == 'fillet'){
           $num -= $num*.2; 
           echo $num . "<br/>";
       }
    }
}

solve(9, ['dice', 'spice', 'chop', 'bake', 'fillet']);
// 3
// 4
// 2
// 6
// 4.8
// Write a program that receives a number and a list of five operations. Perform the operations in sequence by starting with the input number and using the result of every operation as starting point for the next. Print the result of every operation in order. The operations can be one of the following:
//   chop – divide the number by two
//  dice – square root of number
//  spice – add 1 to number
//  bake – multiply number by 3
//  fillet – subtract 20% from number
// The input comes in 2 lines. On the first line you will receive your starting point and must be parsed to a number. On the second line you will receive 5 commands separated by “, “. Each one will be the name of the operation to be performed.