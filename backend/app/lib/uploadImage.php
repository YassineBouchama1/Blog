
<?php


function uploadImage($fileInputName, $targetDirectory)
{
    $result = new stdClass();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
            $originalFileName = $_FILES[$fileInputName]['name'];
            $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

            // Generate a unique identifier (you can customize this logic)
            $uniqueIdentifier = uniqid();

            // Create a unique file name by appending the identifier to the original file name
            $uniqueFileName = $originalFileName . '_' . $uniqueIdentifier . '.' . $fileExtension;

            $targetPath = $targetDirectory . $uniqueFileName;

            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
                $result->success = true;
                $result->message = "Image uploaded successfully.";
                $result->path = $targetPath;
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



// function uploadImage($fileInputName, $targetDirectory)
// {
//     $result = new stdClass();

//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
//             $targetPath = $targetDirectory . basename($_FILES[$fileInputName]['name']);

//             if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetPath)) {
//                 $result->success = true;
//                 $result->message = "Image uploaded successfully.";
//                 $result->path = $targetPath;
//             } else {
//                 $result->success = false;
//                 $result->message = "Error uploading image.";
//             }
//         } else {
//             $result->success = false;
//             $result->message = "Please select a valid image file.";
//         }
//     } else {
//         $result->success = false;
//         $result->message = "Invalid request.";
//     }

//     return $result;
// }
