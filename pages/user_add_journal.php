<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

if (isset($_POST['submit'])){

	$user_id = $_POST['journ_user'];
	$title = $_POST['journ_title'];
	$desc = $db->real_escape_string($_POST['journ_desc']);
	$volume = $_POST['journ_vol'];
	$issue = $_POST['journ_issue'];
	$issn = $db->real_escape_string($_POST['journ_issn']);
	$pub = $_POST['journ_publisher'];
	$jdate = $_POST['journ_date'];
	$dev = $_POST['journ_dev_team'];
	$photoname = $_FILES['journ_photo']['name'];
	$location1 = "../images/journals/".$photoname;
	$filename = $_FILES['journ_file']['name'];
	$location2 = "../resources/journals/".$filename;
	$posted = date('y-m-d h:m:s');
    $updated = date('y-m-d h:m:s');

	$query = "INSERT INTO research_journal (journal_id, journal_user_id, journal_title, journal_description, journal_volume, journal_issue, journal_issn, journal_publisher_name, journal_date_publish, journal_editor_team, journal_filename, journal_filepath, journal_posted_at, journal_updated_at, journal_photo)
            VALUES (NULL, '$user_id', '$title', '$desc', '$volume', '$issue', '$issn', '$pub', '$jdate', '$dev', '$filename', '$location2', '$posted', '$updated', '$photoname')";

    if ($db->query($query) === TRUE) {
		// Save the upload file to the local filesystem
		if (move_uploaded_file($_FILES['journ_photo']['tmp_name'], $location1) && move_uploaded_file($_FILES['journ_file']['tmp_name'], $location2)) {
			header("Location:user_journal_list.php");    
		} else {
		    echo "NOK";
		}

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
			    <div class="navbar-header">
			      	<a class="navbar-brand nav_title_a" href="homepage.php">
			      		<span><img src="../images/logo1.png" height="30px" width="50px"></span>
			      		<!-- <p class="title_brand_nav text-center"> -->
			      			<span class="title_brand_nav"> Division Digital Research Library </span>
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

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
                    
                    <div class="col-sm-6 col-sm-offset-3 body_middle">
                    	<h3> Add Journal </h3>
                    	<form target="_SELF" method="POST" enctype="multipart/form-data">
                    		<input id="journ_user" type="hidden" value="<?= $_SESSION['userid'] ?>" name="journ_user">
						    <div class="input-group">
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="journ_title" type="text" class="form-control" name="journ_title" placeholder="title" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Journal Description</span>
						      	<input id="journ_desc" type="text" class="form-control" name="journ_desc" placeholder="tell us about the Journal" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Volume</span>
						      	<input id="journ_vol" type="number" class="form-control" name="journ_vol" placeholder="1" min="1" max="50" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Issue</span>
						      	<input id="journ_issue" type="number" class="form-control" name="journ_issue" placeholder="1" min="1" max="50" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">ISSN</span>
						      	<input id="journ_issn" type="text" class="form-control" name="journ_issn" placeholder="1467-9817" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Date Published</span>
						      	<input id="journ_date" type="date" class="form-control" name="journ_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Publisher</span>
						      	<input id="journ_publisher" type="text" class="form-control" name="journ_publisher" placeholder="Additional Info" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Development Team Member</span>
						      	<input id="journ_dev_team" type="text" class="form-control" name="journ_dev_team" placeholder="Member Name" required>
						    </div>
						    <br>
					       	<p class="text-justify">Insert the Front Page Photo:
					      		<input id="journ_photo" type="file" class="" name="journ_photo" accept="image/*, .pdf, .doc, .txt" required>
					      	</p>
					       	<p class="text-justify">Journal Final Copy:
					      		<input id="journ_file" type="file" class="" name="journ_file" accept="image/*, .pdf, .doc, .txt" required>
					      	</p>
						    <input type = "submit" name = "submit" value = "Add Journal">
	  					</form>
                    </div>
	                    
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<!-- <footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer> -->

	</body>

</html>
