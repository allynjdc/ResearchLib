<?php
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
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
		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
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
                    
                    <div class="col-sm-6 col-sm-offset-3 body_middle" >
                    	<br>
                    	<h3> Update Journal </h3>
                    	<br>
                    	<form>
						    <div class="input-group">
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="journ_title" type="text" class="form-control" name="journ_title" placeholder="title">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Journal Description</span>
						      	<input id="journ_desc" type="text" class="form-control" name="journ_desc" placeholder="tell us about the Journal">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Volume</span>
						      	<input id="journ_vol" type="number" class="form-control" name="journ_vol" placeholder="1" min="1" max="50">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Issue</span>
						      	<input id="journ_issue" type="number" class="form-control" name="journ_issue" placeholder="1" min="1" max="50">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">ISSN</span>
						      	<input id="journ_issn" type="text" class="form-control" name="journ_issn" placeholder="1467-9817" >
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Date Published</span>
						      	<input id="signed_date" type="date" class="form-control" name="signed_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Development Team Member</span>
						      	<input id="dev_team" type="text" class="form-control" name="dev_team" placeholder="Member Name">
						    </div>
						    <br>
						       	<p class="text-justify">Insert the Front Page Photo:</p>
						      	<input id="journ_photo" type="file" class="" name="journ_photo" accept="image/*, .pdf, .doc, .txt">
						    <br>
						    <button class="btn-success" type="submit" >Update</button>
	  					</form>
                    </div>
	                    
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
