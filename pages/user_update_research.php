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
		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand " href="homepage.php">
			      		<p class="title_brand_nav"> Division Digital Research Library </p>
			      	</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="memorandum.php">Memorandums</a></li>
			    	<li><a href="journals.php">Journals & Books</a></li>
                    <li><a href="help.php">Help</a></li>
			      	<li class="dropdown">
                        <a href="#" class="dropbtn">MyUser </a>
                        <div class="dropdown-content">
                            <a href="user_profile_view.php">View Profile</a>
                            <a href="user_profile_update.php">Edit Profile</a>
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
                                    <option value="National"> National </option>
                                    <option value="Regional"> Regional </option>
                                    <option value="Schools Division"> Schools Division </option>
                                    <option value="District"> District </option>
                                    <option value="School"> School </option>
                                </select>
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon">Research Type</span>
                                <select name="research_type" id="research_type" class="form-control">
                                    <option value="Action Research"> Action Research </option>
                                    <option value="Basic Research"> Basic Research </option>
                                </select>
                            </div>
                            </br>
                            <div class="input-group">
						      	<span class="input-group-addon">Research Agenda</span>
                                <select name="research_agenda" id="research_agenda" class="form-control">
                                    <option value="Teaching and Learning"> Teaching and Learning </option>
                                    <option value="Child Protection"> Child Protection </option>
                                    <option value="Human Resource Development"> Human Resource Development </option>
                                    <option value="Governance"> Governance </option>
                                    <option value="DRRM"> DRRM </option>
                                    <option value="Gender Development"> Gender Development </option>
                                    <option value="Inclusive Education"> Inclusive Education </option>
                                    <option value="Others"> Others </option>
                                </select>
                            </div>
                            </br>
                            <div class="input-group" >
						      	<span class="input-group-addon">Date Signed</span>
						      	<input id="date_signed" type="date" class="form-control" name="date_signed" placeholder="">
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">DOI</span>
						      	<input id="research_doi" type="text" class="form-control" name="research_doi" placeholder="00.0000/0000000000000-0">
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="journal_title" type="text" class="form-control" name="journal_title" placeholder="Title of Journal">
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon">Volume</span>
						      	<input id="journ_vol" type="number" class="form-control" name="journ_vol" placeholder="1" min="1" max="50">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Issue</span>
						      	<input id="journ_issue" type="number" class="form-control" name="journ_issue" placeholder="1" min="1" max="50">
						    </div>
						    <br>
                            <div class="input-group" >
						      	<span class="input-group-addon">Pages</span>
						      	<input id="journal_title" type="text" class="form-control" name="journal_title" placeholder="xx-xx">
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon" style="background-color: #ffb19e;">Research Status</span>
                                <select name="research_status" id="research_status" class="form-control">
                                    <option value="Conducted"> Conducted </option>
                                    <option value="Submitted"> Submitted </option>
                                    <option value="Disseminated"> Disseminated </option>
                                    <option value="Used"> Used </option>
                                </select>
						    </div>
						    <br>

						    	<p class="text-justify">Insert the Research File:</p>
						      	<input id="journ_photo" type="file" class="" name="journ_photo" accept="image/*, .pdf, .doc, .txt">
						    <br>
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
		<!-- <footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer> -->

	</body>
</html>