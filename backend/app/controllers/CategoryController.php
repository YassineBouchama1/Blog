<?php

require 'app/models/CategoryModel.php';
require 'app/lib/Utility.php';
require 'app/lib/uploadImage.php';

class CategoryController
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
        $latestCategories = CategoryModel::latest();

        if ($latestCategories) {
            echo json_encode($latestCategories);
            return;
        }
        Utility::sendResponse("There are no categories", 404);
    }


    // Get category by id
    public static function findCategoryAction()
    {
        // Reception data from query id
        extract($_GET);
        $category = CategoryModel::find($category_id);

        // Check if there is a category
        if ($category) {
            echo json_encode($category);
            return;
        }
        Utility::sendResponse("There is no category under this $category_id", 404);
    }





    // Create a new category
    public static function createAction()
    {
        // Check if data is sent in the POST request
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        // $image = isset($_POST['image']) ? $_POST['image'] : null;

        // upload image to path
        //1>
        $targetDirectory = 'uploads/categories/';
        //2>
        $result = uploadImage('image', $targetDirectory);


        //check if image uploaded
        if ($result->success) {
            $category = new CategoryModel();

            $category->setImage($result->path);
            $category->setName($name);
        } else {
            Utility::sendResponse("Error: " . $result->message, 500);
        }


        if ($category->create()) {
            Utility::sendResponse("Category created successfully", 201);
        } else {
            Utility::sendResponse("Failed to create category", 500);
        }
    }




    // Update category
    public static function updateAction()
    {
        // Reception data from query id and save it
        // in variable with the same name as data comes
        extract($_GET);

        //1- Check if category_id sent
        if (!$category_id) return Utility::sendResponse("category_id is Required", 404);

        //2- Check if data is sent in the POST request
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $image = isset($_POST['image']) ? $_POST['image'] : null;

        //3- check if a category is exist first
        $isCategoryExist = CategoryModel::find($category_id);


        if ($isCategoryExist) {

            $category = new CategoryModel();


            //4- check if user  wants update image also
            if ($image !== null) {


                //4-1- upload image to path
                $targetDirectory = 'uploads/categories/';

                $result = uploadImage('image', $targetDirectory);



                //4-2 -check if image uploaded
                if ($result->success) {
                    $category->setImage($image);
                } else {
                    Utility::sendResponse("Error: " . $result->message, 500);
                    return;
                }
            }

            //5- set data to sitters
            $category->setId($category_id);
            $category->setName($name);

            //6- Execute the update function
            if ($category->update()) {
                Utility::sendResponse("Category updated successfully", 200);
                return;
            } else {
                Utility::sendResponse("Failed to update Category", 500);
                return;
            }
        } else {
            Utility::sendResponse("There is no category under this $category_id", 404);
            return;
        }
    }




    // Delete category by id
    public static function destroyAction()
    {
        // Reception data from query id
        extract($_GET);
        $category = CategoryModel::destroy($category_id);

        // Check if the category is deleted
        if ($category) {
            Utility::sendResponse("Category with ID: $category_id deleted", 200);
            return;
        }
        Utility::sendResponse("There is no category under this $category_id", 404);
    }
}
