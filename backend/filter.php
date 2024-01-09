<?php
// require 'cors.php';


require 'app/Controllers/FilterController.php';


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {

        case 'byTag':
            FilterController::findByTagAction();
            break;
        case 'byCategory':
            FilterController::findByCategoryAction();
            break;
        case 'search':
            FilterController::searchPostsAction();
            break;
    }
} else {
    PostController::latestAction();
}
