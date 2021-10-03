<?php
// NOTE: Uploading profile image is not yet being handled. [2021-10-03]

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $firstname = $decoded['fname'];
    $middlename = $decoded['mname'];
    $lastname = $decoded['lname'];
    $desination = $decoded['designation'];
    $office = $decoded['office'];
    $email = $decoded['email'];
    $username = $decoded['username'];
    $password = "depedtagum"; // default password for new user
    $filename = $decoded['filename'];

    $query = "INSERT INTO user (user_id, username, password, first_name, middle_name, last_name, email_address, designation, office, user_type, profile_picture)
            VALUES (NULL, '$username', MD5('$password'), '$firstname', '$middlename', '$lastname', '$email', '$desination', '$office', '0', '$filename')";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();

?>
