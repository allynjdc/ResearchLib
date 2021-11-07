<?php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $userid = $decoded['userid'];
    $active_state = $decoded['activate'];

    $query = "UPDATE user SET  user_active_state = '$active_state' WHERE user_id = '$userid'";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();
