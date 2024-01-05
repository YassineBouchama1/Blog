<?php

require 'app/models/CategoryModel.php';
require 'app/lib/Utility.php';
require 'functions.php';
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
        $image = isset($_POST['image']) ? $_POST['image'] : null;
        $category = new CategoryModel();

        // upload image to path
        $targetDirectory = 'uploads/categories/';
        $result = uploadImage('image', $targetDirectory);
        if ($result->success) {

            $category->setImage($result->path);
        } else {
            Utility::sendResponse("Error: " . $result->message, 500);
        }
        $category->setName($name);

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

        // Check if category_id sent
        if (!$category_id) return Utility::sendResponse("category_id is Required", 404);

        // Check if data is sent in the POST request
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $image = isset($_POST['image']) ? $_POST['image'] : null;

        // Find a category by ID
        $isCategoryExist = CategoryModel::find($category_id);

        if ($isCategoryExist) {
            $category = new CategoryModel();
            $category->setId($category_id);
            $category->setName($name);
            $category->setImage($image);

            // Execute the update function
            if ($category->update()) {
                Utility::sendResponse("Category updated successfully", 200);
            } else {
                Utility::sendResponse("Failed to update Category", 500);
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
