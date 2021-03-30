<form method="post">
  Color: <input type="color" name="color" />
  <button type="submit">Submit</button>
</form>

<?php
echo "<h1>Welcome To My Magical Site</h1>";

if(isset($_COOKIE['font-style'])){
   // echo 'yes ' . $_COOKIE['font-style'];
   $font = $_COOKIE['font-style'];
   echo "<h2 style='font-style:{$font}'>KUKU LALA from cookie font-style</h2>";
}
if(isset($_POST['color']) && $_POST['color'] !== ''){
   $color = $_POST['color'];
   setcookie("background-color", $color, time()+10);// expires in 10sec
   setcookie("test", json_encode([1,2,3]));
   echo "<p bgcolor='$color'>Hola, vamos al a playa :)</p>";
   header("Location: another.php");
   exit;
}



