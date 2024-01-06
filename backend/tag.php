<?php
// require 'cors.php';


require 'app/Controllers/TagController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'latest':
            TagController::latestAction();
            break;
        case 'find':
            TagController::findAction();
            break;

        case 'create':
            TagController::createAction();
            break;

        case 'update':
            TagController::updateAction();
            break;
        case 'delete':
            TagController::destroyAction();
            break;

        default:
            echo "Page Not found 404";
            break;
    }
} else {
    TagController::latestAction();
}
