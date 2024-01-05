<?php
// require 'cors.php';


// use app\controllers\AuthController;

require 'app/Controllers/AuthController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'register':
            AuthController::registerAction();
            break;
        case 'login':
            AuthController::loginAction();
            break;

        default:
            echo "Page Not found 404";
            break;
    }
} else {
    echo ' nothing happend';
}
