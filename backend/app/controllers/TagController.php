<?php

require 'app/models/TagModel.php';
require 'app/lib/Utility.php';
require 'app/lib/uploadImage.php';

class TagController
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
        $latestTags = TagModel::latest();

        if ($latestTags) {
            echo json_encode($latestTags);
            return;
        }
        Utility::sendResponse("There are no tags", 404);
    }



    // Get tag by id
    public static function findAction()
    {
        // Reception data from query id
        extract($_GET);
        //1- Check if category_id sent
        if (!$tag_id) return Utility::sendResponse("tag is Required", 404);
        $tag = TagModel::find($tag_id);

        // Check if there is a tag
        if ($tag) {
            echo json_encode($tag);
            return;
        }
        Utility::sendResponse("There is no tag under this $tag_id", 404);
    }





    // Create a new tag
    public static function createAction()
    {
        // Check if data is sent in the POST request
        $name = isset($_POST['name']) ? $_POST['name'] : null;

        $tag = new TagModel();
        $tag->setName($name);

        if ($tag->create()) {
            Utility::sendResponse("tag created successfully", 201);
        } else {
            Utility::sendResponse("Failed to create tag", 500);
        }
    }




    // Update category
    public static function updateAction()
    {
        // Reception data from query id and save it
        // in variable with the same name as data comes
        extract($_GET);
        $requiredFields = ['name'];



        Utility::validator($requiredFields);


        //1- Check if category_id sent
        if (!$tag_id) return Utility::sendResponse("tag is Required", 404);



        //2- Check if data is sent in the POST request
        $name = isset($_POST['name']) ? $_POST['name'] : null;



        //3- check if a category is exist first
        $isTagExist = TagModel::find($tag_id);


        if ($isTagExist) {

            $tag = new TagModel();

            //5- set data to sitters
            $tag->setId($tag_id);
            $tag->setName($name);


            //6- Execute the update function
            if ($tag->update()) {
                Utility::sendResponse("tag updated successfully", 200);
                return;
            } else {
                Utility::sendResponse("Failed to update tag", 500);
                return;
            }
        } else {
            Utility::sendResponse("There is no tag under this $tag_id", 404);
            return;
        }
    }




    // Delete category by id
    public static function destroyAction()
    {
        // Reception data from query id
        extract($_GET);
        //1- Check if tag sent
        if (!$tag_id) return Utility::sendResponse("tag_id is Required", 404);

        $isTaxExist = TagModel::find($tag_id);
        // Check if the tag exist
        if ($isTaxExist) {

            $tag = TagModel::destroy($tag_id);

            // Check if the tag is deleted
            if ($tag) {
                Utility::sendResponse("tag with ID: $tag_id deleted", 200);
                return;
            }
        }

        Utility::sendResponse("There is no tag under this $tag_id", 404);
    }
}
