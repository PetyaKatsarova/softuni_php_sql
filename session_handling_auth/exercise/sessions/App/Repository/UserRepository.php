<?php
namespace App\Repository;

use App\Data\UserDTO;

use UserRepositoryInterface;
// interface UserRepositoryInterface
// {
//     public function insert(UserDTO $userDTO) : bool;
//     public function findOneByUsername(string $username) : UserDTO;
// }

class UserRepository implements UserRepositoryInterface
{
    private $db;
    public function __construct($db)
    {
       $this->db = $db;
    }

    public function insert(UserDTO $userDTO) : bool
    {
        $this->db->query("INSERT INTO users2(username, PASSWORD) 
                         VALUES(?,?)
                        --  or the same as ?: VALUES(:username, :PASSWORD)
                        ")->execute([
                            $userDTO->getUsername(),
                            $userDTO->getPassword()
                        ]);
    }
    public function findOneByUsername(string $username) : UserDTO
    {
        
    }
}