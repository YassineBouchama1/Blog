<?php

require 'app/models/FilterModel.php';
require 'app/lib/Utility.php';
require 'app/lib/uploadImage.php';

class FilterController
{
    private static $utility;

    public function __construct()
    {
        // Create an instance of the Utility class
        self::$utility = new Utility();
    }

    // Get all categories
    public static function searchPostsAction()
    {
        extract($_GET);

        $latestCategories = FilterModel::searchPosts($word);

        if ($latestCategories) {
            echo json_encode($latestCategories);
            return;
        }
        Utility::sendResponse("There are no categories", 404);
    }




    // Get post by tag name
    public static function findByTagAction()
    {

        extract($_GET);
        //1- Check if user_id sent
        if (!$tag) return Utility::sendResponse("tag is Required", 404);
        $posts = FilterModel::findPostsByTag($tag);

        // Check if there is a posts
        if ($posts) {
            echo json_encode($posts);
            return;
        }
        Utility::sendResponse("There is no post under this $tag", 404);
    }


    // Get post by category name
    public static function findByCategoryAction()
    {

        extract($_GET);
        //1- Check if user_id sent
        if (!$category) {
            Utility::sendResponse("category is Required", 404);
            return;
        }
        $posts = FilterModel::findPostsByCategory($category);

        // Check if there is a posts
        if ($posts) {
            echo json_encode($posts);
            return;
        }

        Utility::sendResponse("There is no post under this $category", 404);
    }
}
