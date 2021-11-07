<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $memo_id = $decoded['memo_id'];

    $query = "DELETE FROM memorandum WHERE memo_id='$memo_id'";
    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK".$db->error;
}
$db->close();
?>