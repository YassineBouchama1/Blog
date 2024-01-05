<?php
// require 'cors.php';


// use app\controllers\AuthController;

require 'app/Controllers/AuthController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'filter':

        case 'register':

            AuthController::registerAction();

            break;


        default:
            echo "Page Not found 404";
            break;
    }
} else {
    echo ' nothing happend';
}
