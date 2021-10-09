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
                    <h3> User Profile </h3>
                    <div class=col-sm-12>
                        <img src="../images/default_profile_picture.jpg" width="150" height="150"/>
                    </div>
                    <form class="form-horizontal" action="">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="name">Name:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" placeholder="Name" value="Juan Dela Cruz">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="designation">Designation:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="designation" placeholder="Designation" value="Master Teacher">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="office">Office:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="office" placeholder="Office name" value="Tagum National Trade School (TNTS)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="email">Email:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" placeholder="account@gmail.com" value="juandelacruz@gmail.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="username">Username:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" id="username" placeholder="Username" value="MyUser">
                            </div>
                        </div>
                        <button class="btn-primary" type="submit" >Update Profile</button>
                    </form>

			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
