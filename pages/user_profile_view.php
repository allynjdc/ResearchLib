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
		<div class="container-fluid text-center ">    
		  	<div class="row content">
			    <div class="col-sm-3 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			    <div class="col-sm-6 center-div center-content body_middle"> 
			    	
			    	<?php 
						$id = intval($_SESSION['userid']);
						// echo $id;
						$query = "SELECT * FROM user WHERE user_id = '$id'";
						if ($result = $db->query($query)){
							// echo "result";

                	        $defaultImg = "default_profile_picture.jpg";
							while ($row = $result->fetch_assoc()){
								// echo "row";
								$userFullname = $row['user_first_name']." ".$row['user_middle_name'][0].". ".$row['user_last_name'];
								$userImage = empty($row['user_profile_picture']) ? $defaultImg : $row['user_profile_picture'];								
					?>

			    	<br> <br>
			      	<img class="img-circle center-block" src="../images/profile_pictures/<?=$userImage?>" alt="<?=$userFullname?>" width="200px" height="200px"> 
			      	<br>
			      	<div>
			      		<p class="title_brand_nav h3">
			      			<b><?=ucwords(strtolower($userFullname))?></b>
			      		</p>
			      		<p class="title_brand_nav h5">
			      			<?=ucwords(strtolower($row['user_email_address']))?>
			      			<br>
			      		</p>
			      		<p class="h5">
			      			<!-- <?=ucwords(strtolower($row['user_email']))?> <br> -->
			      			<?=ucwords(strtolower($row['user_designation']))?> <br>
			      			<?=ucwords(strtolower($row['user_office']))?> <br>
			      		</p>
			      		<br>	
			      	</div>

			      	<?php 

			      		}

					} else {
						echo "<p> No users yet.</p>";
					}

					?>

			      	<div class="text-justify">
			      		<p class="title_brand_nav h4">
			  				<b> Researches: </b> <br><br>
			      		</p>
			      	
				      	<div class="" style="left:10px">
				      		<!-- FETCHING RESEARCH DATA -->
					    	<?php 
								$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE r.researcher_id = '$id'";

								if ($result = $db->query($query)){
									// echo "result";
									while ($row = $result->fetch_assoc()){

							?>
				      		<div class="">
								<p class="h4 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </a></b></p>
								<p class="h5 text-justify" style="color: maroon">
									<?=$row['researcher_first_name'][0].".".$row['researcher_middle_name'][0].". ".$row['researcher_last_name']?> - <?=ucwords(strtolower($row['journal_title'])).", ".date('Y',strtotime($row['journal_date_publish']))?> 
								</p>
								<p class="h6 text-justify">
									<?=substr($row['research_abstract'], 0, 270)."....."?>
								</p>
								<p>&nbsp;</p>
								<br>
							</div>

							<?php
								}
							} else {
								echo "<p> No conducted Research yet.</p>";
							}
							?>
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
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div>

	</body>
</html>
