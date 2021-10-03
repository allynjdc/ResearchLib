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
		<div class="container-fluid text-center">    
		  	<div class="row content">

		  		<!-- LEFT SIDE NAVIGATION -->
			    <div class="col-sm-2 sidenav">
			      	
			    </div>

			    <!-- MIDDLE CONTENT -->
			     <div class="col-sm-8 center-div" style="background-color: white; "> 
			    	
			      	<div class="center_content" >
				    	<br>
				    	<!-- <div class="col-md-10 form-row align-items-center" >
							<form action="/action_page.php" >
	    						<div class="input-group" >
	     							<input type="text" class="form-control" placeholder="Search" name="search" style="height: 40px;">
	      							<div class="input-group-btn" >
	       								<button class="btn btn-default" type="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
	      							</div>
	    						</div>
	 						</form>
						</div>
						<br><br><hr> -->
						<div class="text-justify">
							<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddResearcherModal" data-whatever="AddResearcher">
								Add Researcher
							</button>
						</div>
						

						<!-- Modal For Add Researcher -->
						<div class="modal fade text-justify col-sm-12" id="AddResearcherModal" tabindex="-1" role="dialog" aria-labelledby="AddResearcherModalLabel" aria-hidden="true">
						    <div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title h3 col-sm-10" id="AddResearcherModalLabel">Add Researcher</h5>
						        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
						          			<span aria-hidden="true">&times;</span>
						        		</button>
						      		</div>
						      		<div class="modal-body">
						        		<form>
						          			<div class="form-group">
						          				<label for="researcher_photo" class="col-form-label">Upload Image:</label>
						          				<input id="researcher_photo" type="file" class="" name="researcher_photo" accept="image/*">
						          			</div>

						          			<div class="form-group">
						            			<label for="researcher-name" class="col-form-label">Name:</label>
						            			<input type="text" class="form-control" id="researcher-name">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher-designation" class="col-form-label">Designation:</label>
									            <input type="text" class="form-control" id="researcher-designation">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher-station" class="col-form-label">Office / School:</label>
									            <input type="text" class="form-control" id="researcher-station">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher-email" class="col-form-label">Email:</label>
									            <input type="email" class="form-control" id="researcher-email">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher-username" class="col-form-label">Username:</label>
									            <input type="text" class="form-control" id="researcher-username">
						          			</div>
						        		</form>
						      		</div>
						      		<div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								        <button type="button" class="btn btn-primary">Add Researcher</button>
						      		</div>
						    	</div>
						  	</div>
						</div>

						<br>
						<!-- For Fetching ---> 
						<div class="col-sm-12 text-justify" >
							<!-- style="border: solid #e8e4e3 0.5px; border-radius: 25px;"> -->
							<a href="user_profile_researcher.php"> <!-- padulong sa profile page sa user --->
								<div class="col-sm-12">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="70px" height="70px">
									</div>
									<div class="col-sm-7 " style=" ">
										<p class="h4" style=""> 
											ALLYN JOY D. CALCABEN
										</p>
										<p class="h6">
											Special Science Teacher I 
											<br>
											Tagum National Trade Schoool 
											<br>
										</p>	
									</div>
									<div class="col-sm-4 text-right h5" style="">
										<a href="#UpdateResearcherModal" data-toggle="modal" data-target="#UpdateResearcherModal" data-whatever="UpdateResearcher">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div>
						<div class="col-sm-12 text-justify" >
							<!-- style="border: solid #e8e4e3 0.5px; border-radius: 25px;"> -->
							<a href="user_profile_researcher.php"> <!-- padulong sa profile page sa user --->
								<div class="col-sm-12">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="70px" height="70px">
									</div>
									<div class="col-sm-7 " style=" ">
										<p class="h4" style=""> 
											ALLYN JOY D. CALCABEN
										</p>
										<p class="h6">
											Special Science Teacher I 
											<br>
											Tagum National Trade Schoool 
											<br>
										</p>	
									</div>
									<div class="col-sm-4 text-right h5" style="">
										<a href="#UpdateResearcherModal" data-toggle="modal" data-target="#UpdateResearcherModal" data-whatever="UpdateResearcher">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div>
						<div class="col-sm-12 text-justify" >
							<!-- style="border: solid #e8e4e3 0.5px; border-radius: 25px;"> -->
							<a href="user_profile_researcher.php"> <!-- padulong sa profile page sa user --->
								<div class="col-sm-12">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="70px" height="70px">
									</div>
									<div class="col-sm-7 " style=" ">
										<p class="h4" style=""> 
											ALLYN JOY D. CALCABEN
										</p>
										<p class="h6">
											Special Science Teacher I 
											<br>
											Tagum National Trade Schoool 
											<br>
										</p>	
									</div>
									<div class="col-sm-4 text-right h5" style="">
										<a href="#UpdateResearcherModal" data-toggle="modal" data-target="#UpdateResearcherModal" data-whatever="UpdateResearcher">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div>
						<div class="col-sm-12 text-justify" >
							<!-- style="border: solid #e8e4e3 0.5px; border-radius: 25px;"> -->
							<a href="user_profile_researcher.php"> <!-- padulong sa profile page sa user --->
								<div class="col-sm-12">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="70px" height="70px">
									</div>
									<div class="col-sm-7 " style=" ">
										<p class="h4" style=""> 
											ALLYN JOY D. CALCABEN
										</p>
										<p class="h6">
											Special Science Teacher I 
											<br>
											Tagum National Trade Schoool 
											<br>
										</p>	
									</div>
									<div class="col-sm-4 text-right h5" style="">
										<a href="#UpdateResearcherModal" data-toggle="modal" data-target="#UpdateResearcherModal" data-whatever="UpdateResearcher">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div>
						<div class="col-sm-12 text-justify" >
							<!-- style="border: solid #e8e4e3 0.5px; border-radius: 25px;"> -->
							<a href="user_profile_researcher.php"> <!-- padulong sa profile page sa user --->
								<div class="col-sm-12">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="70px" height="70px">
									</div>
									<div class="col-sm-7 " style=" ">
										<p class="h4" style=""> 
											ALLYN JOY D. CALCABEN
										</p>
										<p class="h6">
											Special Science Teacher I 
											<br>
											Tagum National Trade Schoool 
											<br>
										</p>	
									</div>
									<div class="col-sm-4 text-right h5" style="">
										<a href="#UpdateResearcherModal" data-toggle="modal" data-target="#UpdateResearcherModal" data-whatever="UpdateResearcher">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div>

				      
					</div>
			    </div>



			    <!-- Modal For Update Researcher -->
				<div class="modal fade text-justify col-sm-12" id="UpdateResearcherModal" tabindex="-1" role="dialog" aria-labelledby="UpdateResearcherModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title h3 col-sm-10" id="UpdateResearcherModalLabel">Update Researcher</h5>
				        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
				          			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>
				      		<div class="modal-body">
				        		<form>
				          			<div class="form-group">
				          				<label for="researcher_photo" class="col-form-label">Upload Image:</label>
				          				<input id="researcher_photo" type="file" class="" name="researcher_photo" accept="image/*">
				          			</div>

				          			<div class="form-group">
				            			<label for="researcher-name" class="col-form-label">Name:</label>
				            			<input type="text" class="form-control" id="researcher-name">
				          			</div>
				          			<div class="form-group">
							            <label for="researcher-designation" class="col-form-label">Designation:</label>
							            <input type="text" class="form-control" id="researcher-designation">
				          			</div>
				          			<div class="form-group">
							            <label for="researcher-station" class="col-form-label">Office / School:</label>
							            <input type="text" class="form-control" id="researcher-station">
				          			</div>
				          			<div class="form-group">
							            <label for="researcher-email" class="col-form-label">Email:</label>
							            <input type="email" class="form-control" id="researcher-email">
				          			</div>
				          			<div class="form-group">
							            <label for="researcher-username" class="col-form-label">Username:</label>
							            <input type="text" class="form-control" id="researcher-username">
				          			</div>
				        		</form>
				      		</div>
				      		<div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary">Add Researcher</button>
				      		</div>
				    	</div>
				  	</div>
				</div>


			    <!-- RIGHT SIDE NAVIGATION -->
			    <div class="col-sm-2 sidenav">
			    	
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
