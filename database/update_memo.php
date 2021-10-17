<?php

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $in = file_get_contents('php://input');
    $decoded = json_decode($in, true);
    $memoId = $decoded['mID'];
    $mUser = $decoded['mUser'];
    $mNum = $decoded['mNum'];
    $mSeries = $decoded['mSeries'];
    $mTitle = $decoded['mTitle'];
    $mSigned = $decoded['mSigned'];
    $mFile = $decoded['mFile'];
    $mFilepath = "../resources/memo/".$mFile;
    $mPosted = date('y-m-d h:m:s');
    $mUpdated = date('y-m-d h:m:s');

    $query = "UPDATE memorandum 
                SET memo_user_id = '$mUser', memo_number = '$mNum', memo_series = '$mSeries', memo_subject = '$mTitle', memo_date = '$mSigned', memo_filename = '$mFile', memo_filepath = '$mFilepath', memo_posted_at = '$mPosted', memo_updated_at = '$mUpdated' 
                WHERE memo_id = '$memoId'";

    if ($db->query($query) === TRUE) echo "OK";
    else echo "NOK";
}

$db->close();
