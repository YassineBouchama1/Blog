<?php
// require 'cors.php';


require 'app/Controllers/PostController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'latest':
            PostController::latestAction();
            break;
        case 'find':
            PostController::findAction();
            break;
        case 'PostsByUser':
            PostController::findByUserAction();
            break;

        case 'create':
            PostController::createAction();
            break;

        case 'update':
            PostController::updateAction();
            break;

        case 'archive':
            PostController::archiveAction();
            break;
        case 'views':
            PostController::incressViews();
            break;
        case 'delete':
            PostController::destroyAction();
            break;
        case 'trending':
            PostController::popularPostsAction();
            break;

            case 'ArchivedPosts':
                PostController::archivedPostsAction();
                break;
        default:
            echo "Page Not found 404";
            break;
    }
} else {
    PostController::latestAction();
}
