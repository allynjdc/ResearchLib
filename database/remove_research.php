<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $research_id = $decoded['research_id'];

    $query = "DELETE research_output, research_creation FROM research_output INNER JOIN research_creation ON research_output.research_id = research_creation.creation_research_id WHERE research_creation.creation_research_id='$research_id'";
    // $query = "DELETE FROM research_creation WHERE creation_research_id='$research_id';
    // 		  DELETE FROM research_output WHERE research_id='$research_id'";
    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK".$db->error;
}
$db->close();
?>