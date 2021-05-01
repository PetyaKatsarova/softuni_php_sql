<?php
namespace Controller;

class UsersController
{
    public function register()
    {
        $error='';
        echo "this is register func";
    }
    public function login()
    {
        echo "this is login func here";
    }
    // profile/edit GET
    public function profileEditGet($id){
        echo "this is GET req from $id in profileEdit";
        echo "<form method=post><input type='submit' /></form>";
    }
    // profile/edit POST
    public function profileEditPost($id){
        // echo "this is POST to edit profile of $id";
        echo "Form for $id profile edit was submitted(POST)";
    }
}