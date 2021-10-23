<?php
// NOTE: Uploading profile image is not yet being handled. [2021-10-03]

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $user_id = $decoded['user'];
    $firstname = $decoded['fname'];
    $middlename = $decoded['mname'];
    $lastname = $decoded['lname'];
    $designation = $decoded['designation'];
    $office = $decoded['office'];
    $email = $decoded['email'];
    $filename = $decoded['filename'];

    $query = "INSERT INTO researcher (researcher_id, researcher_user_id, researcher_first_name, researcher_middle_name, researcher_last_name, researcher_email, researcher_designation, researcher_office, researcher_profile_picture)
            VALUES (NULL, '$user_id', '$firstname', '$middlename', '$lastname', '$email', '$designation', '$office','$filename')";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();

?>
