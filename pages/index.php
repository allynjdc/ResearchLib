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
		<!-- <div class="main_nav">
			<div class="topnav" id="myTopnav">
  				<a class="nav_name" href="index.php">Division Digital Research Library</a>
  				<div align="right">
  					<a href="memorandum.php">Memorandum</a>
			  		<a href="journals.php">Journals and Books</a>
			  		<a href="help.php">Help</a>
			  		<a href="login.php">Login</a>
			  		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			    		<i class="fa fa-bars"></i>
			  		</a>
  				</div>
			  	
			</div>			
		</div> -->

		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand " href="search_result.php">
			      		<p class="title_brand_nav"> Division Digital Research Library </p>
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
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="memorandum.php">Memorandums</a></li>
			    	<li><a href="journals.php">Journals</a></li>
			      	<!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Log in</a></li> -->
			      	<li><a href="login.php">Log in</a></li>
			    </ul>
		  	</div>
		</nav>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">
			    <div class="col-sm-3 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			    <div class="col-sm-6 center-div"> 
			    	<br> <br>
			      	<img class="img-responsive center-block" src="../images/research icon.png" alt="Division Digital Research Library" width="445" height="330"> 

			      	<br>

			      	<div class="text-center title_brand"> 
						<h1> Division Digital Research Library </h1>
			      	</div>

			      	<br>
			      	
					<div class="col-md-6 col-md-offset-3 form-row align-items-center">
						<form action="/action_page.php">
    						<div class="input-group" >
     							<input type="text" class="form-control" placeholder="Search" name="search" style="height: 40px;">
      							<div class="input-group-btn" >
       								<button class="btn btn-default" type="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
      							</div>
    						</div>
 						</form>
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
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
