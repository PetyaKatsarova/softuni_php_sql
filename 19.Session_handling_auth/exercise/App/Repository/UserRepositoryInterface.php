<?php

use app\Data\UserDTO;

interface UserRepositoryInterface
{
     public function insert(UserDTO $userDTO):bool;
     public function findOneByUsernam(string $username) :  UserDTO;
}