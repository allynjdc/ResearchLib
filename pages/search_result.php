<?php
include "../database/db_config.php";
session_start();

if (isset($_GET['submit'])){
	$key 	= $_GET['user_search'];
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
						<form action="search_result.php" target="_SELF" method="GET" enctype="multipart/form-data" >
    						<div class="input-group" >
     							<input type="text" class="form-control" value="<?=$key?>" name="user_search" id="user_search" style="height: 40px;">
      							<div class="input-group-btn" >
       								<button class="btn btn-default" type="submit" name="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
      							</div>
    						</div>
 						</form>
					</div>
					<br><br><hr>
					<?php 
						$key = "";
						
						if (isset($_GET['submit'])){
							$key 	= $_GET['user_search'];
						}

						$search = "%".$key."%";
						
						$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE ro.research_keywords LIKE '$search'";

						if ($result = $db->query($query)) {
							while ($row = $result->fetch_assoc()) {
															
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
						echo "<p> No results found.</p>";
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
