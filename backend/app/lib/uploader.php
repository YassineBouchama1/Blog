<!-- File: functions.php -->
<?php

function uploadImage($fileInputName, $targetDirectory)
{
    $result = new stdClass();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
            $targetPath = $targetDirectory . basename($_FILES[$fileInputName]['name']);

            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
                $result->success = true;
                $result->message = "Image uploaded successfully.";
                $result->path = $targetPath; // Add this line to store the path
            } else {
                $result->success = false;
                $result->message = "Error uploading image.";
            }
        } else {
            $result->success = false;
            $result->message = "Please select a valid image file.";
        }
    } else {
        $result->success = false;
        $result->message = "Invalid request.";
    }

    return $result;
}



//how to call it



// require 'functions.php';

// // Assuming you have an instance of your database connection
// $databaseConnection = new PDO(/* Your database connection parameters */);

// // Specify the target directory to save the image
// $targetDirectory = 'uploads/';

// // Example: Call the uploadImage function
// $result = uploadImage('image', $targetDirectory);

// // Output the result
// if ($result->success) {
//     echo "Image saved successfully.";
// } else {
//     echo "Error: " . $result->message;
// }


?>