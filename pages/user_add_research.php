<DOCTYPE! html>
<html>
	<head>
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
		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand " href="#">
			      		<p class="title_brand_nav"> Division Digital Research Library </p>
			      	</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="#">Memorandums</a></li>
			    	<li><a href="#">Journals & Books</a></li>
                    <li><a href="#">Help</a></li>
			      	<li class="dropdown">
                        <a href="#" class="dropbtn">MyUser </a>
                        <div class="dropdown-content">
                            <a href="user_profile.php">View Profile</a>
                            <a href="#">Edit Profile</a>
                            <a href="index.php">Log out</a>
                        </div>
                    </li>
			    </ul>
		  	</div>
		</nav>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">

		  		<!-- LEFT SIDE NAVIGATION -->
                <!--
			    <div class="col-sm-2 sidenav">
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			    </div>
                -->

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
			    	
                <div class="col-sm-6 col-sm-offset-3" style="background-color: white">
                    	<br>
                    	<h3> Upload Research </h3>
                    	<br>
                    	<form>
						    <div class="input-group">
						      	<span class="input-group-addon">Title</span>
						      	<input id="Memo_code" type="text" class="form-control" name="research_title" placeholder="Research Title">
						    </div>
						    <br>
						    <div class="input-group" >
						      	<span class="input-group-addon">Researchers</span>
						      	<input id="title" type="text" class="form-control" name="researcher_name" placeholder="Juan Dela Cruz">
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon">School</span>
						      	<input id="title" type="text" class="form-control" name="school_name" placeholder="Tagum National Trade School">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Research Category</span>
                                <select name="research_category" id="research_category" class="form-control">
                                    <option value="1"> National </option>
                                    <option value="2"> Regional </option>
                                    <option value="3"> Schools Division </option>
                                    <option value="4"> District </option>
                                    <option value="5"> School </option>
                                </select>
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon">Research Type</span>
                                <select name="research_type" id="research_type" class="form-control">
                                    <option value="1"> Action Research </option>
                                    <option value="2"> Basic Research </option>
                                </select>
                            </div>
                            </br>
						    <p><b> Note: Form not yet complete </b><p>
						    <button class="btn-success" type="submit" >Upload Research</button>
	  					</form>
                    </div>
	                    
						
			    </div>

			    <!-- RIGHT SIDE NAVIGATION -->
                <!--
			    <div class="col-sm-2 sidenav">
			    	<div class="well">
			        	<p>ADS</p>
			      	</div>
			      	<div class="well">
			        	<p>ADS</p>
			      	</div>
			    </div>
                -->
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>
</html>
