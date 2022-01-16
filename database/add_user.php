<?php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $firstname = ucwords(strtolower($decoded['fname']));
    $middlename = ucwords(strtolower($decoded['mname']));
    $lastname = ucwords(strtolower($decoded['lname']));
    $desination = $decoded['designation'];
    $office = $decoded['office'];
    $email = $decoded['email'];
    $username = $decoded['username'];
    $password = "depedtagum"; // default password for new user
    $filename = $decoded['filename'];

    $query = "INSERT INTO user (user_id, user_username, user_password, user_first_name, user_middle_name, user_last_name, user_email_address, user_designation, user_office, user_type, user_pwd_state, user_active_state, user_profile_picture)
            VALUES (NULL, '$username', MD5('$password'), '$firstname', '$middlename', '$lastname', '$email', '$desination', '$office', '0', '0', '1', '$filename')";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();

?>
