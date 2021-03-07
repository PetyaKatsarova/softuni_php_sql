<?php
function answer(PDO $db,int $questionId,int $userId, string $body){
    $sql = "INSERT INTO answers (body, author_id,question_id)
    VALUES(?, ?, ?)";

    $stmt = $db->prepare($sql);
    $stmt->execute([$body, $userId, $questionId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAnswersByQuestionId(PDO $db, int $questionId) : array
{
   $sql = "SELECT a.id, a.body, a.created_on, 
   u.username AS 'author_name' 
   FROM answers AS a
   INNER JOIN 
   users2 u on a.author_id = u.id
   WHERE a.question_id = ?
   ORDER BY a.created_on DESC,
   a.id";

   $stmt = $db->prepare($sql);
   $stmt->execute([$questionId]);
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}