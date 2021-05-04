<?php
namespace Repositories\Users;

use Data\Users\UserDTO;
use Data\Users\UserEditDTO;
use Database\DatabaseInterface;
class UserRepository implements UserRepositoryInterface
{
    private $db;
    /**
     * UserRepository constructor.
     * @param $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function getAll(): \Generator
    {
        return $this->db->query("SELECT * FROM users2")->execute()->fetch();
    }

    public function register(UserDTO $userDTO)
    {
        $this->db->query("INSERT INTO users2 (username, PASSWORD) VALUES (?, ?)")
            ->execute([$userDTO->getUsername(), $userDTO->getPassword()]);
    }

    public function getByUsername(string $username): UserDTO
    {
        $user = $this->db->query("SELECT * FROM users2 WHERE username = ?")->execute([$username])->fetch();
        // WHY IS THAT?
        $user = $user->current();
    
        if($user['id']){
            return new UserDTO($user['id'], $user['username'], $user['PASSWORD'], '', $user['profile_picture_url']);
        }
        echo "Wrong username";
        return new UserDTO('', $user['username'], $user['PASSWORD'], '', $user['profile_picture_url']);
    }

    public function getById(int $id): UserDTO
    {
        $user = $this->db->query("SELECT * FROM users2 WHERE id = ?")->execute([$id])->fetch();
        $user = $user->current();

        return new UserDTO($user['id'], $user['username'], $user['PASSWORD'], '', $user['profile_picture_url']);
    }

    public function edit(int $id, UserEditDTO $userEditDTO, bool $changePassword)
    {
        $query = "UPDATE users2 SET username = ?";
        $params = [$userEditDTO->getUsername()];
        if ($changePassword) {
            $query .= ", PASSWORD = ?";
            $params[] = $userEditDTO->getNewPassword();
        }
        $query .= " WHERE id = ?";
        $params[] = $id;

        $this->db->query($query)->execute($params);
    }

    // public function setPictureUrl(string $filePath,int $id
    public function setPictureUrl(string $filePath, int $id)
    {
        $this->db->query("UPDATE users2 SET profile_picture_url = ? WHERE id = ?")
            ->execute([$filePath, $id]);
    }
    
}