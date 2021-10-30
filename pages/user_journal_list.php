<?php
include "../database/db_config.php";
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
			    <ul class="nav navbar-nav navbar-right">
			    	<li class="title_brand"><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand"><a class="title_brand" href="journals.php">Journals</a></li>
                    <li class="dropdown title_brand">
                        <a href="#" class="dropbtn title_brand"><?= $_SESSION['user'] ?></a>
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
		  	<div class="row content ">

			    <div class="col-sm-3 sidenav" >
			    	<!-- <div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6">
			    					      	
			      	</div> -->
			    </div>

			    <div class="col-sm-6 center_content body_middle">
			    	<p>&nbsp;</p>
			    	<div class="text-justify">
			    		<a href="user_add_journal.php">
			    			<button type="button" class="btn btn-primary ">
								Add Journal
							</button>
			    		</a>						
					</div>

			    	<br>
			    	<!-- <div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
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
					</div> -->

					<!-- FETCHING MEMORANDUM -->
					<?php 
						$query = "SELECT * FROM research_journal ORDER BY journal_date_publish DESC";
						if ($result = $db->query($query)){
							while ($row = $result->fetch_assoc()){
								$jid = $row['journal_id'];
								$jtitle = $row['journal_title'];
								$jvol = $row['journal_volume'];
								$jissue = $row['journal_issue'];
								$mDate = strtotime($row['journal_date_publish']);
								$jphoto = $row['journal_photo'];
								$jLoc = "../images/journals/".$jphoto;

								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								$jDate = strtoupper($months[date('m',$mDate)])." ".date('Y',$mDate);
								// $memoDate = $mDate;
					?>

					<div class="col-sm-12" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<div class="col-sm-2" >
							<img class="" src="<?=$jLoc?>" alt="<?=$jtitle?>" width="75px" height="110px">
						</div>
						<div class="col-sm-10">
							<p class="h4 text-justify"><b><a href="journals_view.php?id=<?=$jid?>"> 
								<?=strtoupper($jtitle)?>
			    			</a></b></p>
						
							<p class="text-justify">
								Volume <?=$jvol?>. No. <?=$jissue?>
							</p>
							<p class="text-justify">
								<?=$jDate?>. 
							</p>
							<p class="text-right" style="">
								<a href="user_update_journal.php?id=<?=$jid?>" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
						</div>
					</div>
					<div>&nbsp;</div>

					<?php

						}
					} else {
						echo "<p> No uploaded journal yet.</p>";
					}
						
					?>


					<div>
						<p>&nbsp;</p>
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
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div>

	</body>
</html>
