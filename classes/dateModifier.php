<?php
class DateModifier{
    private $differenceOfDates;

    public function daysInBetween($str1, $str2){
        // convert date into unix seconds
        $secsStr1 = strtotime($str1);
        $secsStr2 = strtotime($str2);
        $this->differenceOfDates = max($secsStr1, $secsStr2) - min($secsStr1, $secsStr2);
        return ceil($this->differenceOfDates / (24 * 60 * 60));
    }
}
$bla = new DateModifier();
echo $bla->daysInBetween('17 March 2021', '11 March 2020');
// Create a class DateModifier which stores the difference of the days between two Dates. It should have a method
// which takes two String parameters representing a date as Strings and calculates the difference in the days between
// them.