<?php
echo "Today is " . date("d-m-Y") . "<br/>";
echo "And it is " .date("l") ."<br/>";

date_default_timezone_set("America/New_York");
// i = min with 00, s=sec with 00, a= am or pm
echo "The time in JFK is " . date("h:i:sa") . "<br/>";

$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d) . "<br/>";

$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

// converts into secs since 1970 unix time
$startdate = strtotime("Saturday");
echo ' /// ' . date("d/m/y", $startdate) . ' /// ';
$enddate = strtotime("+6 weeks", $startdate);

// record next 6 saturdays
while ($startdate < $enddate) {
  echo date("d M D", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}

// automatically to update copyright year
?>
&copy; 2010 - <?php echo date("Y");?>;