<!-- File: functions.php -->
<?php

function uploadImage($fileInputName, $targetDirectory)
{

    // create empty object useing built in stdclass
    $result = new stdClass();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the file input is set and there are no errors
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
            // create path where folder is
            $targetPath = $targetDirectory . basename($_FILES[$fileInputName]['name']);

            // Move the uploaded img to folder
            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
                $result->success = true;
                $result->message = "Image uploaded successfully.";
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