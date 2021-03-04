<?php
function answer($db,$id,$userId, $body){
    
}

function getAnswersByQuestionId(PDO $db, int $questionId) : array
{
   $sql = "SELECT a.id, a.body, a.created_on, 
   u.username AS 'author_name' 
   FROM answers AS a
   INNER JOIN 
   users u on a.author_id = u.id
   WHERE a.question_id = ?";

   $stmt = $db->prepare($sql);
   $stmt->execute([$questionId]);
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
}