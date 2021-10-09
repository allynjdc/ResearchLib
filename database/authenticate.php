<?php
include 'db_config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $username = $decoded['uname'];
    $password = $decoded['pwd'];

    $query = "SELECT * FROM user WHERE user_username='$username' AND user_password=MD5('$password')";
    $result = $db->query($query);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['user'] = $username;
        echo "OK";
    } else {
        echo "NOK";
    }
}
?>