<?php
session_start();
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
	<body class="bg-light" style="background-image: url('../images/bg.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
		<!-- Navigation -->
		<?php 
			@include("navigation.php");
		?>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">
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
		<?php 
			@include("footer.php");
		?>

	</body>
</html>
