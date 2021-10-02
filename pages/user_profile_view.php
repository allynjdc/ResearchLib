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
			      	<a class="navbar-brand " href="homepage.php">
			      		<p class="title_brand_nav"> Division Digital Research Library </p>
			      	</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="memorandum.php">Memorandums</a></li>
			    	<li><a href="journals.php">Journals</a></li>
                    <li><a href="help.php">Help</a></li>
					<li class="dropdown">
                        <a href="#" class="dropbtn"><?= $_SESSION['user'] ?></a>
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
		<div class="container-fluid text-center ">    
		  	<div class="row content">
			    <div class="col-sm-3 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			    <div class="col-sm-6 center-div center-content" style="background-color: white"> 
			    	<br> <br>
			      	<img class="img-circle center-block" src="../images/calcaben.png" alt="calcaben" width="200px" height="200px"> 

			      	<br>
			      	
			      	<div>
			      		<p class="title_brand_nav h3">
			      			<b>Allyn Joy D. Calcaben</b>
			      		</p>
			      		<p class="h4">
			      			Special Science Teacher 1 <br>
			      			Tagum National Trade School <br>
			      		</p>
			      		<br>
			      		<form action="/action_page.php" >
    						<div class="input-group-btn" >
   								<button type="button" class="btn btn-default btn-sm">
						          	<span class="glyphicon glyphicon-pencil"></span> Edit 
						        </button>
  							</div>
  						</form>
			      		<hr>	
			      	</div>

			      	<div class="text-justify">
			      		<p class="title_brand_nav h4">
			  				<b> Researches: </b> <br><br>
			      		</p>
			      	
				      	<div class="" style="left:10px">
				      		<div class="">
								<p class="h4 text-justify"><b><a>DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </b></a></p>
								<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
								<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored ...</p>
								<p></p>
								<br> 
							</div>
							<div class="">
								<p class="h4 text-justify"><b><a>DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </b></a></p>
								<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
								<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored ...</p>
								<p></p>
								<br>
							</div>
							<div class="">
								<p class="h4 text-justify"><b><a>DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </b></a></p>
								<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
								<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored ...</p>
								<p></p>
								<br>
							</div>
				      	</div>
			      	</div>
			    </div>

			    <div class="col-sm-3 sidenav">
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
		<!-- <footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer> -->

	</body>
</html>
