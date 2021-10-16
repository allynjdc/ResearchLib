<?php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $userid = $decoded['userid'];
    $firstname = $decoded['fname'];
    $middlename = $decoded['mname'];
    $lastname = $decoded['lname'];
    $desination = $decoded['designation'];
    $office = $decoded['office'];
    $email = $decoded['email'];
    $username = $decoded['username'];
    $filename = $decoded['filename'];

    $query = "UPDATE user
            SET  user_username = '$username', user_first_name = '$firstname', user_middle_name = '$middlename', user_last_name = '$lastname', user_email_address = '$email', user_designation = '$desination', user_office = '$office', user_profile_picture = '$filename'
            WHERE user_id = '$userid'";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();
