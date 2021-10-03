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
		<div class="container-fluid ">    
		  	<div class="row content" style="background-color: white; ">

			    <div class="col-sm-3 sidenav" >
			    	<div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6" style="background-color: white;">
			    					      	
			      	</div>
			    </div>

			    <div class="col-sm-6 center_content" style="background-color: white; ">
			    	<p>&nbsp;</p>
			    	<div class="text-justify">
			    		<a href="user_add_journal.php">
			    			<button type="button" class="btn btn-primary " >
								Add Journal
							</button>
			    		</a>						
					</div>

			    	<br>
			    	<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<div class="col-sm-2" >
							<img class="" src="../images/science-diliman.png" alt="science-diliman" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php">SCIENCE DILIMAN: A PHILIPPINE JOURNAL OF PURE AND APPLIED SCIENCES
			    			</a></b></p>
						
							<p class="text-justify">
								Volume 28. No. 1
							</p>
							<p class="text-justify">
								June 2016. 
							</p>
							<p class="text-right" style="">
								<a href="user_update_journal.php" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>
					<div>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<div class="col-sm-2" >
							<img class="" src="../images/science-diliman.png" alt="science-diliman" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php">SCIENCE DILIMAN: A PHILIPPINE JOURNAL OF PURE AND APPLIED SCIENCES
			    			</a></b></p>
						
							<p class="text-justify">
								Volume 28. No. 1
							</p>
							<p class="text-justify">
								June 2016. 
							</p>
							<p class="text-right" style="">
								<a href="user_update_journal.php" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>
					<div>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%; height: auto">
		    			<div class="col-sm-2" >
							<img class="" src="../images/science-diliman.png" alt="science-diliman" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php">SCIENCE DILIMAN: A PHILIPPINE JOURNAL OF PURE AND APPLIED SCIENCES
			    			</a></b></p>
						
							<p class="text-justify">
								Volume 28. No. 1
							</p>
							<p class="text-justify">
								June 2016. 
							</p>
							<p class="text-right" style="">
								<a href="user_update_journal.php" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>
					<div>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%; height: auto">
		    			<div class="col-sm-2" >
							<img class="" src="../images/science-diliman.png" alt="science-diliman" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php">SCIENCE DILIMAN: A PHILIPPINE JOURNAL OF PURE AND APPLIED SCIENCES
			    			</a></b></p>
						
							<p class="text-justify">
								Volume 28. No. 1
							</p>
							<p class="text-justify">
								June 2016. 
							</p>
							<p class="text-right" style="">
								<a href="user_update_journal.php" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>
					<div>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<div class="col-sm-2" >
							<img class="" src="../images/science-diliman.png" alt="science-diliman" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php">SCIENCE DILIMAN: A PHILIPPINE JOURNAL OF PURE AND APPLIED SCIENCES
			    			</a></b></p>
						
							<p class="text-justify">
								Volume 28. No. 1
							</p>
							<p class="text-justify">
								June 2016. 
							</p>
							<p class="text-right" style="">
								<a href="user_update_journal.php" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>
					<div>
						<p>&nbsp;</p>
					</div>
					<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<div class="col-sm-2" >
							<img class="" src="../images/science-diliman.png" alt="science-diliman" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php">SCIENCE DILIMAN: A PHILIPPINE JOURNAL OF PURE AND APPLIED SCIENCES
			    			</a></b></p>
						
							<p class="text-justify">
								Volume 28. No. 1
							</p>
							<p class="text-justify">
								June 2016. 
							</p>
						<p class="text-right" style="">
								<a href="user_update_journal.php" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>

					<div class="text-right">
						<ul class="pagination pagination-sm ">
						    <li><a href="#">Previous</a></li>
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li><a href="#">Next</a></li>
  						</ul>
					</div>

				</div>
						
				<div class="col-sm-3 sidenav" >
			    	
			    </div>
		  	</div>
		</div>

		<!-- Footer -->
		<!-- <footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer> -->

	</body>
</html>