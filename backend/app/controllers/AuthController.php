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

        // extract($_POST);
        //list of data expect user send it 
        $requiredFields = ['username', 'email', 'password', 'role'];

        //validation
        Utility::validator($requiredFields);


        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $role = isset($_POST['role']) ? $_POST['role'] : null;
        // $image = isset($_POST['image']) ? $_POST['image'] : null;

        $image = isset($_FILES['image']) ? $_FILES['image'] : null;





        //check if name exist 
        $auth = new AuthModel();


        //4- check if user  wants update image also
        if ($image !== null) {


            //4-1- upload image to path
            $targetDirectory = 'uploads/users/';

            $result = uploadImage('image', $targetDirectory);



            //4-2 -check if image uploaded
            if ($result->success) {
                $auth->setImage($image);
            } else {
                Utility::sendResponse("Error: " . $result->message, 500);
                return;
            }
        } else {

            // if user dosn't add image upload fake oine
            $auth->setImage("uploads/users/avatar.jpg");
        }


        //set data 
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



    // this is acontroller  for login ccount
    public static function loginAction()
    {


        // this is a fucntion build in to get data from post and speard it  to variabls
        extract($_POST);

        //list of data expect user send it 
        $requiredFields = ['email', 'password'];

        //validation
        Utility::validator($requiredFields);


        //check if name exist 
        $auth = new AuthModel();
        //set data 
        //fake data
        // $auth->setEmail('test1@gmail.com');
        // $auth->setPassword('pass123');


        $auth->setEmail($email);
        $auth->setPassword($password);



        if ($auth->login()) {
            Utility::sendResponse("Login successfully", 200);
        } else {
            Utility::sendResponse("Failed to Login ", 500);
        }
    }
}
