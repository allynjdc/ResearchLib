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
	<body >
		<!-- Navigation -->
		<?php 
			@include("navigation.php");
		?>

		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center bg-light" style="background-image: url('../images/bgs.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">    
		  	<div class="row content">
			    <div class="col-sm-5 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			     <div class="col-sm-7 center-div"> 
			      	<div class="col-md-12" style="height: 450px;"></div>
			      	<!-- <div class="col-md-1"></div> -->
			      	
					<div class="col-md-9 col-md-offset-1 form-row align-items-center" style="left:55px; top:-30px;">
						<form action="search_result.php" method="GET" enctype="multipart/form-data">
    						<div class="input-group" >
     							<input type="text" class="form-control" placeholder="Search Researches" name="user_search" id="user_search" style="height: 40px;">
      							<div class="input-group-btn" >
       								<button class="btn btn-default" type="submit" name = "submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
      							</div>
    						</div>
 						</form>
					</div>
					<div>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
					</div>	
			    </div>


			    <div class=" sidenav">
			    	
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<!-- 		
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div> 
		-->

		<?php 
			@include("footer.php");
		?>

	</body>
</html>
