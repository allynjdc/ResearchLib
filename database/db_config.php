<?php
    $hostName = "localhost";
    $userName = "root"; // Default username
    $password = "";  // Default password
    $dbName = "research_elib_db";

    // Create connection
    $db = mysqli_connect($hostName, $userName, $password, $dbName) or die($db);

    // Check connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>