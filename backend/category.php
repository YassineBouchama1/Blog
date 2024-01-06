<?php
// require 'cors.php';


require 'app/Controllers/CategoryController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'latest':
            CategoryController::latestAction();
            break;
        case 'find':
            CategoryController::findCategoryAction();
            break;

        case 'create':
            CategoryController::createAction();
            break;

        case 'update':
            CategoryController::updateAction();
            break;
        default:
            echo "Page Not found 404";
            break;
    }
} else {
    CategoryController::latestAction();
}
