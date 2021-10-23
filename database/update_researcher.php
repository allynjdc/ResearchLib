<?php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $rId = $decoded['rID'];
    $user_id = $decoded['user'];
    $firstname = $decoded['fname'];
    $middlename = $decoded['mname'];
    $lastname = $decoded['lname'];
    $designation = $decoded['designation'];
    $office = $decoded['office'];
    $email = $decoded['email'];
    $filename = $decoded['filename'];

    $query = "UPDATE researcher
            SET  researcher_user_id = '$user_id', researcher_first_name = '$firstname', researcher_middle_name = '$middlename', researcher_last_name = '$lastname', researcher_designation = '$designation', researcher_office = '$office', researcher_email = '$email', researcher_profile_picture = '$filename'
            WHERE researcher_id = '$rId'";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();
