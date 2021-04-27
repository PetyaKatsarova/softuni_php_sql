<?php
namespace App\Service;
use App\Data\UserDTO;

class UserServie implements UserServiceInterface
{
    public function register(UserDTO $user, $confirmPassword):bool
    {
        If($user->getPassword() != $confirmPassword){
            return false;
        }
        $user->setPassword(password_hash($user->getPassword, PASSWORD_BCRYPT));
        return $this->userRepository->insert($user);
    }
    public function login(string $username, string $password):bool{

    }
    public function ediProfile($i, UserDTO $user):bool{

    }
    /** @return \Generator|UserDTO*/
    public function viewAll():\Generatorbool{

    }
    public function isLogged():bool{

    }
    public function getCurrentUser(): ?UserDTObool{

    }
}