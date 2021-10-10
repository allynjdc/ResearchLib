<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $username = $decoded['uname'];
    $IsPwdReset = ($decoded['reset'] == "1");
    $newPassword = ($IsPwdReset ? "depedtagum" : $decoded['pwd']);
    $pwdState = ($IsPwdReset ? "0" : "1");

    $query = "UPDATE user SET user_password=MD5('$newPassword'), user_pwd_state=$pwdState WHERE user_username='$username'";
    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}
$db->close();
?>