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
    $data = [];
    $row = $result->fetch_assoc();
    if ($row) {
        if ($row['user_active_state'] == 1) {  // Check if the user account is still active
            $_SESSION['user'] = $row['user_username'];
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['usertype'] = $row['user_type'];

            $data['success'] = 1;
            $data['pwdState'] = $row['user_pwd_state'];
            $data['errMsg'] = '';
        } else {
            $data['success'] = 0;
            $data['pwdState'] = '';
            $data['errMsg'] = 'Your account has been deactivated. Please contact the admin for more information.';
        }
    } else {
        $data['success'] = 0;
        $data['pwdState'] = '';
        $data['errMsg'] = 'Incorrect username or password. Please try again.';
    }
    header('Content-type: application/json');
    echo json_encode($data);
}
?>