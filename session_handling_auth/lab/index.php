<form>
   Color: <input type="text" name="color"/>
   <button type="sumbit"/>
</form>

<?php
echo "<h1>welcome to another</h1>";
if (isset($_POST['color'])){
   $color = $_POST['color'];
   setcookie("background-color", $color);
   header("Location: another.php");
   exit;
}

