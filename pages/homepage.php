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
		<?php 
			@include("navigation.php");
		?>

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

							<form action="search_result.php" method="GET" enctype="multipart/form-data">
	    						<div class="input-group" >
	     							<input type="text" class="form-control" placeholder="Search Researches" name="user_search" id="user_search" style="height: 40px;">
	      							<div class="input-group-btn" >
	       								<button class="btn btn-default" type="submit" name = "submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
	      							</div>
	    						</div>
	 						</form>
						</div>
						<br><br><br>
						<div class="center-div">
							<!-- Only admin users are allowed to update users -->
							<?php if ($_SESSION['usertype'] && $_SESSION['usertype'] == '1') { ?>
								<a class="col-sm-3 center-div" href="user_list.php">
									<img src="../images/icon_users.png"  width="120" height="120">
									<br> USERS
								</a>
							<?php } ?>

		                    <a class="col-sm-3 center-div" href="researcher_list.php">
		                    	<img src="../images/icon_researchers.png" width="120" height="120">
		                    	<br> RESEARCHERS
		                    </a>
						</div>
		                <br><br><br><br><br><br><br><br><br><br>
						<div class="center-div">
							<a class="col-sm-3 center-div" href="user_research_status.php">
								<img src="../images/icon_research.png" width="120" height="120">
		                    	<br> RESEARCHES
							</a>
		                    <a class="col-sm-3 center-div" href="user_journal_list.php">
		                    	<img src="../images/icon_journals.png" width="120" height="120">
		                    	<br> JOURNALS
		                    </a>
		                    <a class="col-sm-3 center-div" href="user_memorandum_list.php">
		                    	<img src="../images/icon_memos.png" width="120" height="120">
		                    	<br> MEMORANDUMS
		                    </a>
						</div>
						<br><br><br><br><br><br><br><br><br><br>
                    </div>
			    </div>
				<div>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</div>
		    </div>
		</div>


		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>

	</body>
</html>
