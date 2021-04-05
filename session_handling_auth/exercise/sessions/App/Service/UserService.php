<?php
use App\Data\UserDTO;

// interface UserServiceInterface
// {
//    public function register(UserDTO $userDTO, $confirmPassword):bool;
// }
class UserService implements UserServiceInterface
{
   private $userRepository;

   public function __construct(UserRepositoryInterface $userRepo)
   {
       $this->userRepository = $userRepo;
   }

   public function register(UserDTO $userDTO, $confirmPassword):bool
   {
        if($userDTO->getPassword() !== $confirmPassword){
            return false;
        }
        if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false; // if you already have this username, dont register a new one
        }
        password_hash($userDTO->getPassword(), algo:PASSWORD_BCRYPT);     

   }
}