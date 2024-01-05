<?php

// namespace app\controllers;

require 'app/models/AuthModel.php';
require 'app/lib/Utility.php';

// use app\models\Company;





class AuthController
{

    private static $utility;

    public function __construct()
    {
        // Create an instance of the Utility class
        self::$utility = new Utility();
    }



    public static function registerAction()
    {

        extract($_POST);
        //list of data expect user send it 
        $requiredFields = ['username', 'email', 'password', 'role'];

        //validation
        Utility::validator($requiredFields);


        //check if name exist 
        $auth = new AuthModel();
        //set data 
        // $auth->setUsername('test1');
        // $auth->setEmail('test1@gmail.com');
        // $auth->setPassword('pass123');
        // $auth->setRole('author');
        $auth->setUsername($username);
        $auth->setEmail($email);
        $auth->setPassword($password);
        $auth->setRole($role);


        if ($auth->register()) {
            Utility::sendResponse("Account created successfully", 201);
        } else {
            Utility::sendResponse("Failed to Create Account", 500);
        }
    }
}
