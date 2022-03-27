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
		<?php 
            @include("navigation.php");
        ?>


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
                            <img class="img-circle center-block" src="../images/profile_pictures/<?=$userImage?>" alt="<?=$userFullname?>" width="200px" height="200px"> 
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

        <br>
		<!-- Footer -->
        <?php 
            @include("footer.php");
        ?>

	</body>
</html>
