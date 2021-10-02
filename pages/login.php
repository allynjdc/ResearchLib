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
		<style>
			/*ToDo: Move this to css file */
			form {
				width: 25%;
				margin-left: auto;
				margin-top: auto;
				margin-right: auto;
				margin-bottom: auto;
			}
		</style>
	</head>
	<body class="bg-light">
		<!-- Navigation -->
		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand " href="index.php">
			      		<p class="title_brand_nav"> Division Digital Research Library </p>
			      	</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="memorandum.php">Memorandums</a></li>
			    	<li><a href="journals.php">Journals</a></li>
			      <!-- <li><a href="#">Log in</a></li> -->
			    </ul>
		  	</div>
		</nav>

		<div class="container-fluid text-center">    
		  	
			<!-- MIDDLE CONTENT -->
			<div class="col-sm-12 center-div mx-auto my-container"> 
				
				<div class=""> 
					<h1> Division Digital Research Library </h1>
				</div>
				</br>
				</br>
				<form id="login" action="home.php" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" id="uname" name="uname" placeholder="Enter Username" class="form-control"/>
					</div>
					</br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" id="pwd" name="pwd" placeholder="Enter Password" class="form-control"/>
					</div>
					</br>
					<button class="btn-primary" type="submit" >Login</button>
				</form>
			</div>
		</div>

		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>