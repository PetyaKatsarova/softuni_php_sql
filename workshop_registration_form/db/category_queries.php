<?php
function getAllCategories($db):array
{
    $sql = "SELECT c.id, c.name, COUNT(q.id) AS questions_count  FROM categories AS c 
    LEFT JOIN questions q on c.id = q.category_id
    GROUP BY c.id,c.name
    ORDER BY questions_count DESC, c.name ASC";

    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}