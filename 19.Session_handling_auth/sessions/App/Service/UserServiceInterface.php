<?php
use App\Data\UserDTO;

interface UserServiceInterface
{
   public function register(UserDTO $userDTO, $confirmPassword):bool;
}