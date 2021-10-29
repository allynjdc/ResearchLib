<?php

session_start();

if (isset($_SESSION['user'])) {
	header("Location:homepage.php"); // If ther user is already logged-in, redirect to the home page
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
		<style>
			/*ToDo: Move this to css file */
			form {
				margin-left: auto;
				margin-top: auto;
				margin-right: auto;
				margin-bottom: auto;
			}
		</style>
	</head>
	<body class="bg-light" style="background-image: url('../images/bg.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
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
			    <!-- <ul class="nav navbar-nav">
			      	<li class=""><a href="#">Home</a></li>
			      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
			        	<ul class="dropdown-menu">
			          		<li><a href="#">Page 1-1</a></li>
			          		<li><a href="#">Page 1-2</a></li>
			          		<li><a href="#">Page 1-3</a></li>
			        	</ul>
			      	</li>
			      	<li><a href="#">Page 2</a></li>
			    </ul> -->
			    <ul class="nav title_brand navbar-nav navbar-right">
			    	<li class="title_brand" ><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand" ><a class="title_brand" href="journals.php">Journals</a></li>
			      	<?php
						if (!isset($_SESSION['user'])) {
							echo "<li class=\"title_brand\" ><a class=\"title_brand\" href=\"login.php\">Login</a></li>";
						} else {
							echo "<li class=\"dropdown title_brand\" >
									<a href=\"#\" class=\"title_brand dropbtn\">" . $_SESSION['user'] . "</a>
									<div class=\"dropdown-content\">
										<a href=\"user_profile_view.php\">View Profile</a>
										<a href=\"user_profile_update.php\">Edit Profile</a>
										<a href=\"logout.php\">Log out</a>
									</div>
								</li>";
						}
					?>
			    </ul>
		  	</div>
		</nav>

		<div class="container-fluid text-center">    
		  	
			<!-- MIDDLE CONTENT -->
			<div class="col-sm-12 center-div mx-auto my-container"> 
			    <div class="col-sm-5 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			    <div class="col-sm-7 center-div"> 
			      	<div class="col-md-12" style="height: 400px;"></div>
			      	<!-- <div class="col-md-1"></div> -->
			      	
					<div class="col-md-9 col-md-offset-1 form-row align-items-center" style="left:55px;">
						<form id="login" method="post">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" id="uname" name="uname" placeholder="Enter Username" class="form-control"/>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" id="pwd" name="pwd" placeholder="Enter Password" class="form-control"/>
							</div>
							<br>
							<div class="col-md-12 input-group" >
								<button class="btn-primary" style="cursor: pointer; width: 100%; border-radius: 5px;" type="button" onclick="authAccount()">Login</button>
							</div>						
							
						</form>
						<p id="status_msg" style="color: red"></p>
					</div>
			    </div>
		    </div>
		</div>

		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
	<script>
	function authAccount() {
		document.getElementById('status_msg').innerHTML = ""; // Reset status message
	
		var username = document.getElementById('uname').value;
		var password = document.getElementById('pwd').value;
		var data = { 'uname': username, 'pwd': password };

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if ((this.readyState == 4) && (this.status == 200)) {
				try {
					var response = JSON.parse(this.responseText);
					if (response.success == 1) {
						// Make sure the user updates his/her password (if still using the default password)
						if (response.pwdState == "0") window.location = "user_password_change.php"; 
						else window.location = "homepage.php";
					} else {
						document.getElementById('pwd').value = ""; // Reset password entered by the user
						document.getElementById('status_msg').innerHTML = response.errMsg;
					}

				} catch (error) {
					throw Error;
				}
			}
		};
		xmlhttp.open("POST", "../database/authenticate.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
		xmlhttp.send(JSON.stringify(data));
	}
	</script>
</html>