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
			    	<!-- <div class="" style="background-color: white;">
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>	
			      	<p><a href="#">Link</a></p>
			      	</div> -->
			    </div>

			    <div class="col-sm-6 center_content body_middle" >

			    	<!-- FETCHING JOURNAL DATA -->
			    	<?php 
						$jid = intval($_GET['id']);
						$filename = "";
						$defaultImg = "default_journal_photo.png";
						$query = "SELECT * FROM research_journal WHERE journal_id = '$jid'";
						if ($result = $db->query($query)){
							// echo "result";
							while ($row = $result->fetch_assoc()){
								$mDate = strtotime($row['journal_date_publish']);
								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								$jDate = strtoupper($months[intval(date('m',$mDate))])." ".date('Y',$mDate);
								$filename = $row['journal_filename'];

					?>

			    	<div class="center_content col-sm-12"  height="300px">  
			    		<div> 
			    			<p class="author_name h3" style="color: maroon;"> <b> <?=strtoupper($row['journal_title'])?> </b> </p>
			    		</div>
			    		<br>     	
						<div class="col-sm-2" >
							<img class="img-responsive" src="../images/journals/<?=empty($row['journal_photo']) ? $defaultImg : $row['journal_photo'];?>" alt="<?=$row['journal_title']?>" width="90px" height="130px" >
						</div>
						
						<div class="col-sm-10 text-left" >
							
							<p>Volume <?=$row['journal_volume']?>. No. <?=$row['journal_issue']?>, series <?=date('Y',$mDate)?> </p>
							<p><?=$jDate?></p>
							<p>ISSN: <?=$row['journal_issn']?></p>
							<!-- <p>DOI: 1467-9817</p> -->
							
						</div>
					</div>

					<div class="center_content col-sm-12">
						<br>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> About this Journal </b></p>
						</div>
						<div>
							<p class="col-sm-12 text-justify">
								<?=$row['journal_description']?>
							</p>
							<p class="col-sm-12 text-justify">
								<br>
								This Journal was published by the <?=$row['journal_publisher_name']?>.
							</p>
						</div>
					</div>

					<div class="center_content col-sm-12">
						<br>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> Development Team </b></p>
						</div>
						
						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left dev_team" style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left  " style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left  " style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left  " style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

					</div>

					<div class="center_content col-sm-12">
						<br>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> Articles </b></p> 
						</div>

						<?php

						$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE rj.journal_id = '$jid'";
						
						if ($result = $db->query($query)) {
							while ($row = $result->fetch_assoc()) {
								$rdate = strtotime($row['journal_date_publish']);
								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

						?>
						
						<div class="col-sm-12">
							<p class="h5 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </b></a></p>
							<p class="h6 text-justify" style="color: maroon"><?=ucwords(strtolower($row['researcher_first_name']))." ".strtoupper($row['researcher_middle_name'][0]).". ".ucwords(strtolower($row['researcher_last_name'])).", ".ucwords(strtolower($row['researcher_office']))?></p>
							<p class="h6 text-justify"> Date Published: <?=strtoupper($months[intval(date('m',$rdate))])." ".date('Y',$rdate)?></p>
							<p></p>
							<br>
						</div>

						<?php
							}
						} else {
							echo "<p> No conducted Research yet.</p>";
						}
						?>
						

					</div>

					<?php 
							if(isset($_SESSION['user'])){
					?>

					<div class="align-items-center">
						<br>
						<iframe src="../resources/journals/<?=$filename?>" width="100%" height="700px">
    					</iframe>
    					<br> <br>
					</div>

					<?php
							}
					
						}
					} else {
						echo "<p> No uploaded journal yet.</p>";
					}
						
					?>

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
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div>

	</body>
</html>
