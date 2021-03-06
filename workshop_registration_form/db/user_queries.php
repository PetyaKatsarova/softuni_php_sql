<?php
function logout(PDO $db, string $authId)
{
    $sql = "DELETE FROM authentications WHERE auth_string=?";
    $stmt = $db->prepare($sql);
    $stmt->execute($authId);
}

function getUserByAuthId(PDO $db, string $authId):int
{
    $sql = "SELECT user_id FROM authentications WHERE auth_string=?";

    $stmt = $db->prepare($sql);
    $stmt->execute([$authId]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if($data && $data['user_id']){
        return (int)$data['user_id'];
    }
    return -1;
}
function issueAuthenticationString(PDO $db, int $userId) : string{
   $sql = "SELECT auth_string FROM authentications WHERE user_id=?";

   $stmt = $db->prepare($sql);
   $stmt->execute([$userId]);
   $data = $stmt->fetch(PDO::FETCH_ASSOC);
   if($data && $data['auth_string']){
       return $data['auth_string'];
   }
    $authString = uniqid();
    $sql = "INSERT INTO authentications(auth_string,user_id)
    VALUES (?,?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$authString,$userId]);
    return $authString;
}
// returns user_id from users2, provided the password matches
function verifyCredentials(PDO $db, string $username,$password){
   $sql = "SELECT id,PASSWORD FROM users2 WHERE username=?";
   $stmt = $db->prepare($sql);
   if(!$stmt->execute([$username])){
    return -1;
}
   $user = $stmt->fetch(PDO::FETCH_ASSOC);
   $passwordHash = $user['PASSWORD'];
   $result = password_verify($password, $passwordHash);
   if($result){
       return (int)$user['id'];
   }
   return -1;
}
function register($db,$username,$password){
    $sql = "INSERT INTO users2 (username,PASSWORD)
           VALUES(?,?)";
    $statement = $db->prepare($sql);
    $result = $statement->execute([$username,
    password_hash($password, PASSWORD_ARGON2I)]);
    return $result;
}