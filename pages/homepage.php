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
			    <ul class="nav navbar-nav navbar-right col-sm-6">
			    	<li class="title_brand"><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand"><a class="title_brand" href="journals.php">Journals</a></li>
                    <!-- <li class="title_brand"><a class="title_brand" href="help.php">Help</a></li> -->
			      	<li class="title_brand" class="dropdown">
                        <a class="title_brand" href="#" class="dropbtn"><?= $_SESSION['user'] ?></a>
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

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 "> 
			    	
                    <!-- <h3> This is home page. </h3> -->
                    <div class="col-sm-6 col-md-offset-3 body_middle"> 
                    	<div class="form-row" >
	                    	<br>
	                    	<!-- <div>
	                    		<img class="" src="../images/research icon.png" alt="Division Digital Research Library" width="250" height="200">
	                    	</div>
	                    	<br> -->

							<form action="/action_page.php">
	    						<div class="input-group" >
	     							<input type="text" class="form-control" placeholder="Search" name="search" style="height: 40px;">
	      							<div class="input-group-btn" >
	       								<button class="btn btn-default" type="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
	      							</div>
	    						</div>
	 						</form>
						</div>
						<br><br><br>
						<div class="center-div">
							<!-- Only admin users are allowed to update users -->
							<?php if ($_SESSION['usertype'] && $_SESSION['usertype'] == '1') { ?>
								<a class="col-sm-3 center-div" href="user_list.php">
									<img src="../images/icon_user.png"  width="120" height="120">
									<br><br> USERS
								</a>
							<?php } ?>

		                    <a class="col-sm-3 center-div" href="researcher_list.php">
		                    	<img src="../images/icon_researcher.png" width="120" height="120">
		                    	<br><br> RESEARCHERS
		                    </a>
						</div>
		                <br><br><br><br><br><br><br><br><br><br>
						<div class="center-div">
							<a class="col-sm-3 center-div" href="user_research_status.php">
								<img src="../images/icon_researches.png" width="120" height="120">
		                    	<br><br> RESEARCHES
							</a>
		                    <a class="col-sm-3 center-div" href="user_journal_list.php">
		                    	<img src="../images/icon_journal.png" width="120" height="120">
		                    	<br><br> JOURNAL
		                    </a>
		                    <a class="col-sm-3 center-div" href="user_memorandum_list.php">
		                    	<img src="../images/icon_memo.png" width="120" height="120">
		                    	<br><br> MEMORANDUMS
		                    </a>
						</div>
						<br><br><br><br><br><br><br><br><br><br><br>

                    </div>
                    
			    </div>
				
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
