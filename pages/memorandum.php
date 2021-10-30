<?php
include "../database/db_config.php";
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
	<body class="bg-light">

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

		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid ">    
		  	<div class="row content">

			    <div class="col-sm-3 sidenav" >
			    	<!-- <div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6">
			    					      	
			      	</div> -->
			    </div>

			    <div class="col-sm-6 center_content body_middle">
			    	<br>
			    	<!-- <div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
					
						<p class="h5 text-justify">
							Virtual Training on Advancing Research Through 6D Scheme for Second Batch
						</p>
						<p class="h5 text-justify">
							DM 284, s. 2021
						</p>
					</div> 
					<br> -->

					<!-- FETCHING MEMORANDUM -->
					<?php 
						$query = "SELECT * FROM memorandum ORDER BY memo_date";
						if ($result = $db->query($query)){
							while ($row = $result->fetch_assoc()){
								$memoNum = $row['memo_number'];
								$memoSeries = $row['memo_series'];
								$memoSubject = $row['memo_subject'];
								$mDate = strtotime($row['memo_date']);
								$memoFilename = $row['memo_filename'];
								$memoDir = $row['memo_filepath'];

								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								$memoDate = strtoupper($months[date('m',$mDate)])." ".date('d',$mDate).", ".date('Y',$mDate);
								// $memoDate = $mDate;

								echo "
									<div style=\"padding:2%; border: solid #e3dede 1px; border-radius:1%;\">
						    			<p class=\"h4 text-justify\"><b><a href=\"memorandum_view.php?memoid=".$row['memo_id']."\">".$memoDate." DM ".$memoNum.", S. ".$memoSeries." - ".strtoupper($memoSubject)." </b></a></p>
									
										<p class=\"h5 text-justify\">
											".ucwords(strtolower($memoSubject))."
										</p>
										<p class=\"h5 text-justify\">
											DM ".$memoNum.", s. ".$memoSeries."
										</p>
									</div>
									<br>
								";
							}
						
						} else {
							echo "<p> No uploaded memorandum yet.</p>";
						}

						?>
					

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
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div>

	</body>
</html>
