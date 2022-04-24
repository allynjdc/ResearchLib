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

						</div>
						<hr>
						<div class="center-div">
							<p>
								Email : tagum.city@deped.gov.ph 
								<br>
								Like us at Facebook Page: 
								<a href="https://www.facebook.com/depedtagumcity">Deped Tagum City Division</a>
								<br>
								IT Officer/Website Administrator : <b>Arian Aime T. Abatayo</b>
								<br>
								Email: ictodepedtagum@gmail.com / arian.abatayo@deped.gov.ph
							</p>
						</div>
		                <hr>
						<div class="center-div">
							Contact No.
							<br>
							Telefax: (084) 216-3504
							<br>
							SDO Cellphone No.: 0917 879 5866
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
