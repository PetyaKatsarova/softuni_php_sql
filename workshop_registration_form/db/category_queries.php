<?php
function createCategory(PDO $db,string $name){
    $sql = "INSERT INTO categories (name) VALUES(?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$name]);
}

function getQuestionsByCategoryId($db,$categoryId):array{
    $sql = "SELECT 
               q.id, q.title, q.author_id,u.username AS 'author_name', q.created_on, c.name AS 'category_name', COUNT(a.id) AS answers_count,
               COUNT(like2.user_id) AS 'likes_count'
            FROM 
                questions AS q
            INNER JOIN users2 u on q.author_id=u.id
            INNER JOIN categories c ON q.category_id=c.id
            LEFT JOIN answers a on q.id = a.question_id
            LEFT JOIN user_likes like2 on q.id = like2.question_id
            WHERE c.id=?
            GROUP BY
                q.id, q.title, q.author_id, u.username, c.name, q.created_on
            ORDER BY
                q.created_on DESC,
                answers_count DESC";

    $stmt = $db->prepare($sql);
    $stmt->execute([$categoryId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCategories($db):array
{
    $sql = "SELECT c.id, c.name, COUNT(q.id) AS questions_count  FROM categories AS c 
    LEFT JOIN questions q on c.id = q.category_id
    GROUP BY c.id,c.name
    ORDER BY questions_count DESC, c.name ASC";

    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}