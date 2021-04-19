<?php
spl_autoload_register();

// (int $id, string $username, string $password, array $questions)
// $pesho = new User(1, "Pesho", '123', [], []);
// $gosho = new User(2, "Gosho", '123', [], []);

// // int $id,string $title, string $body, DateTime $createdOn, User $author, array $answers)
// $question1pesho = new Question(1, "How do you write in php?", "Please, let me know.", new DateTime(), $pesho, []);

// $question2pesho = new Question(2, "How do you write in js?", "Please, let me know.", new DateTime(), $pesho, []);

// $question1gosho = new Question(3, "Are coming to Angsbaka?", "Please, let me know.", new DateTime(), $gosho, []);

// $pesho->setQuestions([$question1pesho, $question2pesho]);
// $gosho->setQuestions([$question1gosho]);

// $answer = new Answer(1, $question1gosho, "Trudno se pishe na php.", $pesho);
// $pesho->setAnswers([$answer]);
// $question1gosho->setAnswers([$answer]);

// echo $gosho->getQuestions()[0]->getAnswers()[0]->getBody();
$pdo = new PDO(dsn:"mysql:host=localhost:3306;dbname=test",username:"root");
/**
 * @var User $user
*/
// !!!!!!!!!!! when using fetchObject: the constructor should be empty!!!
$user = $pdo->query("Select * FROM users2 WHERE id=17")->fetchObject(User::class);
echo $user->getUsername();