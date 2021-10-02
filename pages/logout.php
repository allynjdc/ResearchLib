<?php
session_start();

session_destroy();
echo "Logout sucessfully";

header("Location:index.php");

?>