<?PHP
$db = new mysqli("127.0.0.1", 'root', "", "test");
// query =  zaiavka
$result = $db->query("SELECT * FROM users2");
$users = $result->fetch_all(MYSQLI_ASSOC);
echo "<table border=1>
        <thead><tr><th>Id</th><th>Username</th><th>Password</th></tr></thead>
        <tbody>";
foreach ($users as $user){
    echo "<tr>
            <td>{$user['id']}</td>
            <td>{$user['username']}</td>
            <td>{$user['PASSWORD']}</td>
          </tr>";
}
echo "</tbody><table>";
     
