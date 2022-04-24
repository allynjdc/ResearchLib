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
	                    	<!-- SDRC -->
	                    	<p>
	                    		
	                    	</p>
	                    </div>
						<hr>
						<div class="center-div">
							<!-- TECHNICAL WORKING GROUP -->
							<p>
								
							</p>
						</div>
		                <hr>
						<div class="center-div">
							<!-- DEVELOPER -->
							<p>
								
							</p>
						</div>
						<br>
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
