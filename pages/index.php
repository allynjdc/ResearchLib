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
		<!-- <div class="main_nav">
			<div class="topnav" id="myTopnav">
  				<a class="nav_name" href="index.php">Division Digital Research Library</a>
  				<div align="right">
  					<a href="memorandum.php">Memorandum</a>
			  		<a href="journals.php">Journals and Books</a>
			  		<a href="help.php">Help</a>
			  		<a href="login.php">Login</a>
			  		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    		<i class="fa fa-bars"></i>
			  		</a>
  				</div>
			  	
			</div>			
		</div> -->

		<nav class="navbar navbar-inverse" > <!-- navbar-default style="background-color: #D5EBF6"-->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header col-md-6">
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
			    <div>
			    <ul class="nav title_brand navbar-nav navbar-right">
			    	<li class="title_brand" >
			    		<a class="title_brand" href="memorandum.php">Memorandums</a>
			    	</li>
			    	<li class="title_brand" >
			    		<a class="title_brand" href="journals.php">Journals</a>
			    	</li>
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
		  	</div>
		</nav>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">
			    <div class="col-sm-5 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			     <div class="col-sm-7 center-div"> 
			      	<div class="col-md-12" style="height: 450px;"></div>
			      	<!-- <div class="col-md-1"></div> -->
			      	
					<div class="col-md-9 col-md-offset-1 form-row align-items-center" style="left:55px;">
						<form action="search_result.php" method="GET" enctype="multipart/form-data">
    						<div class="input-group" >
     							<input type="text" class="form-control" placeholder="Search Researches" name="user_search" id="user_search" style="height: 40px;">
      							<div class="input-group-btn" >
       								<button class="btn btn-default" type="submit" name = "submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
      							</div>
    						</div>
 						</form>
					</div>
						
			    </div>


			    <div class=" sidenav">
			    	<!-- <div class="well">
			        	<p>ADS</p>
			      	</div>
			      	<div class="well">
			        	<p>ADS</p>
			      	</div> -->
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
