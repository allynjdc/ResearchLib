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
		
	</head>
	<body class="bg-light">

		<!-- Navigation -->
		<nav class="navbar navbar-inverse" > <!-- navbar-default style="background-color: #D5EBF6"-->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand nav_title_a" href="index.php">
			      		<span><img src="../images/logo1.png" height="30px" width="50px"></span>
			      		<!-- <p class="title_brand_nav text-center"> -->
			      			<span class="title_brand_nav"> Division Digital Research Library </span>
			      		<!-- </p> -->
			      	</a>
			    </div>
			    
			    <ul class="nav navbar-nav navbar-right">
			    	<li class="title_brand"><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand"><a class="title_brand" href="journals.php">Journals</a></li>
					<?php
						if (!isset($_SESSION['user'])) {
							echo "<li class=\"title_brand\"><a class=\"title_brand\" href=\"login.php\">Login in</a></li>";
						} else {
							echo "<li class=\" title_brand dropdown\">
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

		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid ">    
		  	<div class="row content body_middle" >

			    <div class="col-sm-3 sidenav" >
			    	<div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6">
			    		<br>
			    		<div>
			    			<p><b>Year</b></p>
			    			<p><a href="#">2021</a></p>
				      		<p><a href="#">2020</a></p>	
				      		<p><a href="#">2017</a></p>
				      		<p><a href="#">Custom Year</a></p>
			    		</div>
			    		<hr>
			    		<div>
			    			<p><b>Research Category</b></p>
			    			<p><a href="#">National</a></p>
				      		<p><a href="#">Region</a></p>	
				      		<p><a href="#">Schools Division</a></p>
				      		<p><a href="#">District</a></p>
				      		<p><a href="#">School</a></p>
				      		<br>
				      		<p><a href="#">Action Research</a></p>
				      		<p><a href="#">Basic Research</a></p>
			    		</div>
			    		<hr>
			    		<div>
			    			<p><b>Research Agenda</b></p>
			    			<p><a href="#">Teaching & Learning</a></p>
				      		<p><a href="#">Child Protection</a></p>	
				      		<p><a href="#">Human Resource Development</a></p>
				      		<p><a href="#">Governance</a></p>
				      		<br>
				      		<p><a href="#">DRRM</a></p>
				      		<p><a href="#">Gender Development</a></p>	
				      		<p><a href="#">Inclusive Education</a></p>
				      		<p><a href="#">Others</a></p>
			    		</div>
				      	
			      	</div>
			    </div>

			    <div class="col-sm-6 center_content">
			    	<br>
			    	<div class="col-md-10 form-row align-items-center" >
						<form action="/action_page.php" >
    						<div class="input-group" >
     							<input type="text" class="form-control" placeholder="Search" name="search" style="height: 40px;">
      							<div class="input-group-btn" >
       								<button class="btn btn-default" type="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
      							</div>
    						</div>
 						</form>
					</div>
					<br><br><hr>
					<div class="">
						<p class="h4 text-justify"><b><a href="research_view.php">DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </a></b></p>
						<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
						<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored in the system, ...</p>
						<p></p>
						<br>
					</div>
					<div class="">
						<p class="h4 text-justify"><b><a href="research_view.php">DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </a></b></p>
						<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
						<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored in the system, ...</p>
						<p></p>
						<br>
					</div>
					<div class="">
						<p class="h4 text-justify"><b><a href="research_view.php">DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </a></b></p>
						<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
						<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored in the system, ...</p>
						<p></p>
						<br>
					</div>
					<div class="">
						<p class="h4 text-justify"><b><a href="research_view.php">DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </a></b></p>
						<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
						<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored in the system, ...</p>
						<p></p>
						<br>
					</div>
					<div class="">
						<p class="h4 text-justify"><b><a href="research_view.php">DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </a></b></p>
						<p class="h5 text-justify" style="color: maroon">AJ Calcaben - Twenty-one Mental Models That Can Change Policing, 2021</p>
						<p class="h6 text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored in the system, ...</p>
						<p></p>
						<br>
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
			    	<!-- <div style="background-color: white;">
			    
				    	<div class="well">
				        	<p>ADS</p>
				      	</div>
				      	<div class="well">
				        	<p>ADS</p>
				      	</div>
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
