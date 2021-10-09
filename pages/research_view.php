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
		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
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
		  	<div class="row content">

			    <div class="col-sm-3 sidenav" >
			    	<!-- <div class="" style="background-color: white;">
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>	
			      	<p><a href="#">Link</a></p>
			      	</div> -->
			    </div>

			    <div class="col-sm-6 center_content body_middle" >
			    <div class=" center_content" >
			    		      	
					<div>
						<p class="author_name h3" style="color: maroon;"> <b>DIGITAL LIBRARY: A WEB-BASED SYSTEM IN HANDLING RESEARCH OUTPUTS </b> </p>
					</div>

					<div>
						<br>
						<p>November 2021 </p>
						<p>DOI: 00.0000/0000000000000-0</p>
						<p> In book: Twenty-one Mental Models That Can Change Policing (pp.9-14) </p>

						<div> 
							<p><span class="glyphicon glyphicon-folder-open">  </span>&nbsp;&nbsp;School Division</p> 
							<p><span class="glyphicon glyphicon-book">  </span> &nbsp;&nbsp;Action Research </p>
							<p><span class="glyphicon glyphicon-briefcase">  </span>&nbsp;&nbsp;Governance</p>
						</div>
						
						<div>
							<br>
							<p class="h4" style="color: maroon;"><b>   Authors: </b></p>
							<div class="" style=" height: 50px">
								<div class="col-sm-1" >
									<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-11 text-left" >
									<p> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School</p>
								</div>
							</div>
						</div>

					</div>
					<div>
						<br> 
						<p class="h4" style="color: maroon;"><b> Abstract </b></p>
						<p class="text-justify">The file management system will assist in resolving the problem. To begin, it makes reviewing and approving content easier. The file management system will digitally store previously accepted, conducted, and used research papers, saving the School's Division Research Committee the time and effort of reviewing each physical copy. Second, since research papers are now digitally stored in the system, it will save space since it has no permanent storage place in the Division Office. The file management system can centralize all of an organization's documents for easy access. It can minimize project delays. Lastly, it will serve as a resource for teachers - researchers who are about to write a research paper. This can also be used as a guide for them to get an idea of what they can do while writing their own research paper. As a result, with the advent of technology, it is critical to have quick access to and management of information. The proposed system's major goal is to provide an operational tool that will help teacher-researchers of the Department of Education, Tagum City Division in filing, saving, and retrieving research outputs. The researcher has curated the system just for that function to serve the teacher-researchers as well as the School’s Division Research Committee and the Department of Education, Tagum City Division. 
						</p>
					</div>
					<div class="align-items-center">
						<br>
						<iframe src="../resources/research/CALCABEN-AJ-Tagum-National-Trade-School-final(updated).pdf" width="100%" height="700px">
    					</iframe>
    					<br> <br>
					</div>
					<div>
						<p class="h4" style="color: maroon;"> <b> Cite this:</b></p>
						<div>
							<p class="col-md-2" style="color: maroon;"><b>MLA</b></p>
							<p class="col-md-10">Guan, Yuanhui, Weihua Shi, and Desheng Wu. "The Design and Development of a School File Management System for Standardized." 2012 International Conference on Computer Science and Electronics Engineering. Vol. 2. IEEE, 2012.</p>
						</div>
						<div>
							<p class="col-md-2" style="color: maroon;"><b>APA</b></p>
							<p class="col-md-10">Guan, Y., Shi, W., & Wu, D. (2012, March). The Design and Development of a School File Management System for Standardized. In 2012 International Conference on Computer Science and Electronics Engineering (Vol. 2, pp. 630-634). IEEE.</p>
						</div>
							<p class="col-md-2" style="color: maroon;"><b>CHICAGO</b></p>
							<p class="col-md-10">Guan, Yuanhui, Weihua Shi, and Desheng Wu. "The Design and Development of a School File Management System for Standardized." In 2012 International Conference on Computer Science and Electronics Engineering, vol. 2, pp. 630-634. IEEE, 2012.</p>
						</div>
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
