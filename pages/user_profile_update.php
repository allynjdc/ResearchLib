<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

$id = intval($_SESSION['userid']);
if (isset($_POST['submit'])){ 
    $fname = $_POST['edit-user-fname'];
    $mname = $_POST['edit-user-mname'];
    $lname = $_POST['edit-user-lname'];
    $desig = $_POST['edit-user-designation'];
    $office = $_POST['edit-user-office'];
    $email = $_POST['edit-user-email'];
    $username = $_POST['edit-user-username'];

    echo $username;
    $query = "UPDATE user 
            SET user_username = '$username', user_first_name = '$fname', user_middle_name = '$mname', user_last_name = '$lname', user_designation = '$desig', user_office = '$office', user_email_address = '$email'
            WHERE user_id = '$id'";

    if ($db->query($query) === TRUE) {
        header("Location:user_journal_list.php");
    } else {
        echo "NOK <br>";
        echo $db->error;
    }
}

?>

<DOCTYPE! html>
<html>
	<head>
        <title> Research eLibrary </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">

		
		<script src="../jquery.js"></script>
		<script src="../script.js"></script>
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="../css/body_css.css">
        <link rel="stylesheet" type="text/css" href="../css/footer_css.css">
        <link rel="stylesheet" type="text/css" href="../css/nav_css.css">
		
	</head>
	<body class="bg-light">
		<!-- Navigation -->
		<nav class="navbar navbar-inverse" > <!-- navbar-default style="background-color: #D5EBF6"-->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header col-sm-6">
                    <a class="navbar-brand nav_title_a col-sm-12" href="<?=(!isset($_SESSION['user']))? "index.php" : "homepage.php"?>">
                        <span class="col-sm-1"><img   src="../images/logo1.png" height="30px" width="50px"></span>
                        <!-- <p class="title_brand_nav text-center"> -->
                            <span class="title_brand_nav col-sm-11" style="margin-top:-2px;">
                                &nbsp; Digital Research Library
                            </span>
                            <br>
                            <h6 class="title_nav_p col-sm-11" style="margin-top:1px;font-size:10px;">
                                &nbsp;&nbsp;&nbsp;&nbsp;of DepEd RXI - Tagum City Division
                            </h6>
                        <!-- </p> -->
                    </a>
                </div>
			    <ul class="nav navbar-nav navbar-right">
			    	<li class="title_brand"><a class="title_brand" href="memorandum.php">Memorandums</a></li>
                    <li class="title_brand"><a class="title_brand" href="journals.php">Journals</a></li>
                    <li class="dropdown title_brand">
                        <a href="#" class="dropbtn title_brand"><?= $_SESSION['user'] ?></a>
                        <div class="dropdown-content">
                            <a href="user_profile_view.php">View Profile</a>
                            <a href="user_profile_update.php">Edit Profile</a>
                            <a href="logout.php">Log out</a>
                        </div>
                    </li>
			    </ul>
		  	</div>
		</nav>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">

                <?php 
                    $id = intval($_SESSION['userid']);
                    // echo $id;
                    $query = "SELECT * FROM user WHERE user_id = '$id'";
                    if ($result = $db->query($query)){
                        // echo "result";
                        $defaultImg = "default_profile_picture.jpg";
                        while ($row = $result->fetch_assoc()){
                            // echo "row";
                            $userImage = empty($row['user_profile_picture']) ? $defaultImg : $row['user_profile_picture'];                              
                ?>

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
                    <h3> User Profile </h3>
                    
                    <form class="form-horizontal" action="" target="_SELF" method="POST" enctype="multipart/form-data">
                        <div class=col-sm-12>
                            <img src="../images/profile_pictures/<?=$userImage?>" alt="<?=$userImage?>" width="150" height="150"/>
                            <div> &nbsp; </div>
                        </div>
                        <div class="form-group">
                            <label for="edit-user-fname" class="col-form-label col-sm-4 text-right">First Name:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit-user-fname" name="edit-user-fname" value="<?=$row['user_first_name']?>">
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="edit-user-mname" class="col-form-label col-sm-4 text-right">Middle Name:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit-user-mname" name="edit-user-mname" value="<?=$row['user_middle_name']?>">
                            </div>
                        </div>
                          <div class="form-group">
                            <label for="edit-user-lname" class="col-form-label col-sm-4 text-right">Last Name:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit-user-lname" name="edit-user-lname" value="<?=$row['user_last_name']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit-user-designation" class="col-form-label col-sm-4 text-right">Designation:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit-user-designation" name="edit-user-designation" value="<?=$row['user_designation']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit-user-office" class="col-form-label col-sm-4 text-right">Office / School:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit-user-office" name="edit-user-office" value="<?=$row['user_office']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit-user-email" class="col-form-label col-sm-4 text-right">Email:</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" id="edit-user-email" name="edit-user-email" value="<?=$row['user_email_address']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit-user-username" class="col-form-label col-sm-4 text-right">Username:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="edit-user-username" name="edit-user-username"  value="<?=$row['user_username']?>">
                            </div>
                        </div>
                        <p id="edit_user_status_msg"></p>
                        <input type="submit" name="submit" value="Update Profile">
                    </form>
			    </div>

                <?php 

                    }

                } else {
                    echo "<p> No users yet.</p>";
                }

                ?>

		  </div>
		</div>


		<!-- Footer -->
        <div class="footer text-center">
            <p>&nbsp;</p> 
            <p class="">All rights reserved &copy; 2021</p>
        </div>

	</body>
</html>
