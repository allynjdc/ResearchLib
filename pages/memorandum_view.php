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

			    <div class="col-sm-6 center_content body_middle">
				    <div class=" center_content" >
				    
				    <!-- FETCHING MEMORANDUM DATA -->
					<?php 
						$id = intval($_GET['memoid']);
						// echo $id;
						$query = "SELECT * FROM memorandum WHERE memo_id = '$id'";
						if ($result = $db->query($query)){
							// echo "result";
							while ($row = $result->fetch_assoc()){
								// echo "row";
								$memoNum = $row['memo_number'];
								$memoSeries = $row['memo_series'];
								$memoSubject = $row['memo_subject'];
								$mDate = strtotime($row['memo_date']);
								$memoFilename = $row['memo_filename'];
								$memoDir = $row['memo_filepath'];

								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								$memoDate = strtoupper($months[date('m',$mDate)])." ".date('d',$mDate).", ".date('Y',$mDate);
					?>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> <?=ucwords(strtolower($memoSubject))?></b> </p>
						</div>
 
						<div>
							<p><?=$memoDate?> </p>
							<p>DM <?=$memoNum?>, s. <?=$memoSeries?> </p>
							
						</div>
						<div class="align-items-center">
							<iframe src="<?=$memoDir?>" width="100%" height="700px">
	    					</iframe>
	    					<br> <br>
						</div>
						
						<?php 

							}	
						} else {
							echo "<p> No uploaded memorandum yet.</p>";
						}

					?>


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
