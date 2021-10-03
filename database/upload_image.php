<?php

// Get the name of the upload file
$filename = $_FILES['file']['name'];
$location = "../images/profile_pictures/".$filename;

// Save the upload file to the local filesystem
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    echo "OK";
} else {
    echo "NOK".$_FILES['file']['error'];
}

?>