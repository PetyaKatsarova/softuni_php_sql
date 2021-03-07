<?php
function findTag($db,$tagName):int
{
  $sql="SELECT id FROM tags WHERE name=?";
  $stmt = $db->prepare($sql);
  $stmt->execute([$tagName]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  if($data && $data['id']){
      return (int)$data['id'];
  }
  $sql = "INSERT INTO tags (name) VALUES (?)";
  $stmt = $db->prepare($sql);
  $stmt->execute([$tagName]);
  return (int)$db->lastInsertId();
}

function getAllTags($db) : array{
    // $sql = "SELECT t.id, t.name, COUNT(q.id) AS 'questions_count'
    //         FROM questions_tags AS qt
    //         INNER JOIN tags t on qt.tags_id=t.id
    //         INNER JOIN questions q on qt.questions_id=q.id
    //         GROUP BY 
    //            t.id,
    //            t.name
    //         ORDER BY 
    //             questions_count DESC,
    //             t.name ASC";
    $sql = "SELECT id, name FROM tags";
    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}