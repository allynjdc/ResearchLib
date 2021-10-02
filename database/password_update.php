<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $username = $decoded['uname'];
    $newPassword = ($decoded['pwd'] == "default_user_143") ? "depedtagum" : $decoded['pwd'];

    $query = "UPDATE user SET password=MD5('$newPassword') WHERE username='$username'";
    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}
$db->close();
?>