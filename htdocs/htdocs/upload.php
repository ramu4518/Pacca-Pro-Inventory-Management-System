<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == 0) {
        $allowed = array("csv" => "text/csv");
        $filename = $_FILES["fileUpload"]["name"];
        $filetype = $_FILES["fileUpload"]["type"];
        $filesize = $_FILES["fileUpload"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Handle file upload
        if (in_array($filetype, $allowed)) {
            $newpath = "upload/" . $filename;
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $newpath)) {
                echo "File uploaded successfully.<br>";
                // Parse CSV File
                $file = fopen($newpath, "r");
                while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                    // Assuming the name of the item is in the first column and the total is in the last column
                    echo "Name of Item: " . htmlspecialchars($column[0]) . " - Total: " . htmlspecialchars(end($column)) . "<br>";
                }
                fclose($file);
            } else {
                echo "File could not be uploaded.";
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["fileUpload"]["error"];
    }
}
?>
