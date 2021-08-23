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
			    	<li><a href="#">Journals</a></li>
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

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
                    
                    <div class="col-sm-6 col-sm-offset-3" style="background-color: white">
                    	<br>
                    	<h3> Upload Memorandum </h3>
                    	<br>
                    	<form>
						    <div class="input-group">
						      	<span class="input-group-addon">Memorandum Code</span>
						      	<input id="Memo_code" type="text" class="form-control" name="Memo_code" placeholder="DM 000, s. 2021">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Subject</span>
						      	<input id="title" type="text" class="form-control" name="title" placeholder="Memorandum Title">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Date Signed</span>
						      	<input id="signed_date" type="date" class="form-control" name="signed_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31">
						    </div>
						    <br>
						       	<p class="text-justify">Insert the File:</p>
						      	<input id="memo" type="file" class="" name="memo" accept="image/*, .pdf, .doc, .txt">
						    <br>
						    <button class="btn-success" type="submit" >Upload</button>
	  					</form>
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
