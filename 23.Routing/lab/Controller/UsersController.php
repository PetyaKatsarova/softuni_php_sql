<?php
namespace Controller;

class UsersController
{
    public function register()
    {
        echo "this is register func.";
    }
    public function login()
    {
        echo "login func here";
    }
    public function profile()
    {
        echo 'public profile opened';
    }
    //  /profile/4/edit GET
    public function editProfile($id)
    {
        echo "edit profile $id page opened";
    }
    //  /profile/4/edit POST
    public function editProfileProcess($id)
    {
        echo "form for $id profile edit submitted";
    }
}