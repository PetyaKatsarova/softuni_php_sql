<?php
use ExerciseDatabase\PrepareDbInterface;

class UserRepository extends UserRepositoryInterface
{
    /** @var PrepareDbInterface */
    private $db;

    public function __construct(PrepareDbInterface $database)
    {
        $this->db = $database;
    }

    public function insert(\App\Data\UserDTO $userDTO):bool
    {
        $this->db->query("INSERT INTO users2(username, PASSWORD) VALUES(?, ?)")->execute([
            $userDTO->getUsername(),
            $userDTO->getPassword()
        ]);
        return true;
    }
    public function findOneByUsernam(string $username) :  UserDTO
    {

    }
}