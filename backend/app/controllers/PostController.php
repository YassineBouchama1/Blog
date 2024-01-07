<?php

require 'app/models/PostModel.php';
require 'app/lib/Utility.php';
require 'app/lib/uploadImage.php';

class PostController
{
    private static $utility;

    public function __construct()
    {
        // Create an instance of the Utility class
        self::$utility = new Utility();
    }

    // Get all categories
    public static function latestAction()
    {
        $latestCategories = PostModel::latest();

        if ($latestCategories) {
            echo json_encode($latestCategories);
            return;
        }
        Utility::sendResponse("There are no categories", 404);
    }



    // Get post by id
    public static function findPostAction()
    {

        extract($_GET);
        //1- Check if category_id sent
        if (!$post_id) return Utility::sendResponse("post_id is Required", 404);
        $post = PostModel::find($post_id);

        // Check if there is a category
        if ($post) {
            echo json_encode($post);
            return;
        }
        Utility::sendResponse("There is no post under this $post_id", 404);
    }




    // Create a new post
    public static function createAction()
    {
        //List of data expected from the user
        $requiredFields = ['user_id', 'category_id', 'title', 'content', 'image'];

        // Validation
        Utility::validator($requiredFields);

        // Check if data is sent in the POST request
        $tags = isset($_POST['tags']) ? explode(',', $_POST['tags']) : [];


        // Upload image to path
        $targetDirectory = 'uploads/posts/';
        $result = uploadImage('image', $targetDirectory);



        // Check if image uploaded
        if (!$result->success) {
            Utility::sendResponse("Error: " . $result->message, 500);
            return;
        }


        $post = new PostModel();
        // set all data 
        $post->setUserId($_POST['user_id']);
        $post->setCategoryId($_POST['category_id']);
        $post->setTitle($_POST['title']);
        $post->setContent($_POST['content']);
        $post->setImage($result->path);


        if ($post->create($tags)) {
            Utility::sendResponse("Post created successfully", 201);
            return;
        } else {
            Utility::sendResponse("Failed to create post", 500);
        }
    }





    // Update category
    public static function updateAction()
    {
        // Reception data from query id and save it
        // in variable with the same name as data comes

        extract($_GET);

        // 1- Check if post_id sent
        if (!$post_id) return  Utility::sendResponse("post id is required ", 404);



        // 3- check if a category is exist first
        $isPostExist = PostModel::find($post_id);

        if (!$isPostExist) {
            Utility::sendResponse("There is no Post under this $post_id", 404);
            return;
        }



        // 2- Check if image is sent in the POST request
        // $image = isset($_POST['image']) ? $_POST['image'] : null;
        $image = isset($_FILES['image']) ? $_FILES['image'] : null;

        $post = new PostModel();


        // 4- check if user  wants to update the image also
        if ($image !== null) {
            // 4-1- upload image to path
            $targetDirectory = 'uploads/posts/';
            $result = uploadImage('image', $targetDirectory);

            // 4-2 -check if image uploaded
            if (!$result->success) {
                Utility::sendResponse("Error: " . $result->message, 500);
                return;
            }

            $post->setImage($result->path);
        }

        // fill sitters
        if ($post_id !== null) {
            $post->setPostId($post_id);
            $post->setUserId($_POST['user_id'] ?? null);
            $post->setCategoryId($_POST['category_id'] ?? null);
            $post->setTitle($_POST['title'] ?? null);
            $post->setContent($_POST['content'] ?? null);
        }



        $tags = isset($_POST['tags']) ? explode(',', $_POST['tags']) : [];


        // 6- Execute the update function
        if ($post->update($tags)) {
            Utility::sendResponse("Post updated successfully", 200);
        } else {
            Utility::sendResponse("Failed to update Post", 500);
        }
    }


    // Delete category by id
    public function destroyAction()
    {
        // Reception data from query id
        $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : null;
        $category = PostModel::destroy($post_id);

        // Check if the category is deleted
        if ($category) {
            Utility::sendResponse("Category with ID: $post_id deleted", 200);
        } else {
            Utility::sendResponse("There is no category under this $post_id", 404);
        }
    }


    public static function archiveAction()
    {
        // Reception data from query id
        $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : null;
        $post = PostModel::archived($post_id);

        // Check if the category is deleted
        if ($post) {
            Utility::sendResponse("post with ID: $post_id archived", 200);
        } else {
            Utility::sendResponse("There is no post under this $post_id", 404);
        }
    }



    public static function incressViews()
    {
        // Reception data from query id
        $post_id = isset($_GET['post_id']) ? $_GET['post_id'] : null;

        $post = PostModel::views($post_id);

        // Check if the category is deleted
        if ($post) {
            Utility::sendResponse("post with ID: $post_id Incress Views", 200);
        } else {
            Utility::sendResponse("There is no post under this $post_id", 404);
        }
    }
}
