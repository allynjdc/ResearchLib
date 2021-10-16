<?php
// NOTE: Uploading profile image is not yet being handled. [2021-10-03]

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $mUser = $decoded['mUser'];
    $mNum = $decoded['mNum'];
    $mSeries = $decoded['mSeries'];
    $mTitle = $decoded['mTitle'];
    $mSigned = $decoded['mSigned'];
    $mFile = $decoded['mFile'];
    $mFilepath = "../resources/memo/".$mFile;
    $mPosted = date('y-m-d h:m:s');
    $mUpdated = date('y-m-d h:m:s');

    $query = "INSERT INTO memorandum (memo_id, memo_user_id, memo_number, memo_series, memo_subject, memo_date, memo_filename, memo_filepath, memo_posted_at, memo_updated_at) VALUES (NULL, '$mUser', '$mNum', '$mSeries', '$mTitle', '$mSigned', '$mFile', '$mFilepath', '$mPosted', '$mUpdated')";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK".$db->error;
}

$db->close();

?>
