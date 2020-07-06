<?php

//class
//blueprint for data type on database
class User
{
    public $email;
    public $name;
    public function login()
    {

        echo 'the user logged in';
    }
}

$userOne = new User();

$userOne->login()
