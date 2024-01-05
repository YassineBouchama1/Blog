<?php
// require 'cors.php';


// use app\controllers\AuthController;

require 'app/Controllers/UserController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'all':
            UserController::latestAction();
            break;

            // find user by passing user_id in url 
        case 'user':
            UserController::findUserAction();
            break;


        case 'block':
            UserController::blockUserAction();
            break;


        case 'delete':
            UserController::destroyAction();
            break;


        case 'update':
            UserController::updateAction();
            break;
        default:
            echo "Page Not found 404";
            break;
    }
} else {
    UserController::latestAction();
}
