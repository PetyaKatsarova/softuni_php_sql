<?php
use \App\Data\UserDTO;

class UserService implements UserServiceInterface
{
    private $userRepository;
    
    private function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    public function register(UserDTO $userDTO, string $confirmPassword) : bool
    {
        if($userDTO->getPassword() !== $confirmPassword){
            return false;
        }
        if(null !== $this->userRepository->findOneByUsername($userDTO->getUsername())){
            return false;
        }
        password_hash($userDTO->getPassword(), PASSWORD_BCRYPT);
        
    }
}