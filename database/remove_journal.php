<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $journal_id = $decoded['journal_id'];

    $query = "DELETE FROM research_journal WHERE journal_id='$journal_id'";
    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK".$db->error;
}
$db->close();
?>