<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $userId = $decoded['userid'];

    $query = "DELETE FROM user WHERE user_id='$userId'";
    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK".$db->error;
}
$db->close();
?>