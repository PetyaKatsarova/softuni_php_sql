
<!-- namespace App\Data;

class UserDTO{
    private $username;
    private $PASSWORD;

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getPassword(){
        return $this->PASSWORD;
    }
    public function setPassword($PASSWORD){
        $this->PASSWORD = $PASSWORD;
    }
}  -->


<?php
namespace Data\Users;

class UserDTO
{
    private $id;
    private $username;
    private $PASSWORD;
    private $confirmPassword;
    private $profilePictureUrl;

    /**
     * UserDTO constructor.
     * @param $id
     * @param $username
     * @param $PASSWORD
     * @param $confirmPassword
     * @param $profilePictureUrl
     */
    // deleted temp $id from args
    public function __construct( $id,$username, $PASSWORD, $confirmPassword, $profilePictureUrl = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->PASSWORD = $PASSWORD;
        $this->confirmPassword = $confirmPassword;
        $this->profilePictureUrl = $profilePictureUrl;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->PASSWORD;
    }

    /**
     * @param mixed $PASSWORD
     */
    public function setPASSWORD($PASSWORD): void
    {
        $this->PASSWORD = $PASSWORD;
    }

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * @param mixed $confirmPassword
     */
    public function setConfirmPassword($confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }

    /**
     * @return mixed
     */
    public function getProfilePictureUrl()
    {
        return $this->profilePictureUrl;
    }

    /**
     * @param mixed $profilePictureUrl
     */
    public function setProfilePictureUrl($profilePictureUrl): void
    {
        $this->profilePictureUrl = $profilePictureUrl;
    }




}