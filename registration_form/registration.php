<?PHP
include_once 'databaseconnection.php';
require_once 'form.php';

if(isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "INSERT INTO users2(username,PASSWORD)
              VALUES(?, ?)";
  // $result = $db->query($sql); never use this: avoid injection
$statement = $db->prepare($sql);
$statement->execute([$username,password_hash($password, PASSWORD_ARGON2I)]);
if($statement){
  header("Location: login.php");
  exit;
}else{
  echo 'Error connecting to db.';
}
}