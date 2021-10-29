<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

if (isset($_POST['submit'])){

	$r_id 		= $_POST['research_id'];
	$title 		= $_POST['research_title'];
	$reseacher 	= $_POST['researcher_name'];
	$office 	= $_POST['research_office'];
	$category 	= $_POST['research_category'];
	$type 		= $_POST['research_type'];
	$agenda 	= $_POST['research_agenda'];
	$date 		= $_POST['research_date_published'];
	$doi 		= $db->real_escape_string($_POST['research_doi']);
	$journal 	= $_POST['research_journal_title'];
	$pages 		= $db->real_escape_string($_POST['research_journal_pages']);
	$status 	= $_POST['research_status'];
	$abstract 	= $db->real_escape_string($_POST['research_abstract']);
	$keywords 	= $db->real_escape_string($_POST['research_keywords']);
	$filename	= $_FILES['research_file']['name'];
	$location 	= '../resources/research/'.$filename;

	$query = "UPDATE research_output 
			  SET research_title = '$title', research_office = '$office', research_category = '$category', research_type = '$type', research_agenda = '$agenda', research_date_publish = '$date', research_doi = '$doi', research_journal_id = '2', research_journal_pages = '$pages', research_abstract = '$abstract', research_status = '$status', research_keywords = '$keywords', research_filename = '$filename', research_filepath = '$location'
			  WHERE research_id = '$r_id' ";

    if ($db->query($query) === TRUE) {
		// Save the upload file to the local filesystem
		if (move_uploaded_file($_FILES['research_file']['tmp_name'], $location)) {
			header("Location:user_research_status.php");    
		} else {
		    echo "NOK";
		}

    } else {
		echo "NOK <br>";
		echo $db->error;
	}

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
		<nav class="navbar navbar-inverse col-md-12" > <!-- navbar-default style="background-color: #D5EBF6"-->
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
			    <ul class="nav navbar-nav navbar-right">
			    	<li class="title_brand"><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand"><a class="title_brand" href="journals.php">Journals</a></li>
                    <li class="dropdown title_brand">
                        <a href="#" class="dropbtn title_brand"><?= $_SESSION['user'] ?></a>
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
			    	
                <div class="col-sm-6 col-sm-offset-3 body_middle">
                    	<br>
                    	<h3> Update Research </h3>
                    	<br>

                    	<!-- FETCHING RESEARCH DATA -->
				    	<?php 
				    		$id = intval($_GET['rid']);
							$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE ro.research_id = '$id'";



							// echo "hello ".$id;

							if ($result = $db->query($query)){
								// echo "result";
								while ($row = $result->fetch_assoc()){

									$jtitle = ucwords(strtolower($row['journal_title']));
									$jpages = $row['research_journal_pages'];
									$rdate = strtotime($row['journal_date_publish']);
									$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

									// echo "hey ";

						?>

                    	<form target="_SELF" method="POST" enctype="multipart/form-data">
						    <input id="research_id" type="hidden" class="form-control" name="research_id" value="<?=$row['research_id']?>">
						    <input id="research_user_id" type="hidden" class="form-control" name="research_user_id" value="<?=$_SESSION['userid']?>">
						    <div class="input-group">
						      	<span class="input-group-addon">Title</span>
						      	<input id="research_title" type="text" class="form-control" name="research_title" value="<?=$row['research_title']?>">
						    </div>
						    <br>
						    <div class="input-group" >
						      	<span class="input-group-addon">Researchers</span>
						      	<input id="researcher_name" type="text" class="form-control" name="researcher_name" value="<?=$row['researcher_first_name']." ".$row['researcher_middle_name'][0].". ".$row['researcher_last_name']?> ">
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon">School / Office</span>
						      	<input id="research_office" type="text" class="form-control" name="research_office" value="<?=$row['research_office']?>">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Research Category</span>
                                <select name="research_category" id="research_category" class="form-control">
                                    <option value="National" <?=($row['research_category']=="National")? "selected" : ""?> > National </option>
                                    <option value="Regional" <?=($row['research_category']=="Regional")? "selected" : ""?> > Regional </option>
                                    <option value="Schools Division" <?=($row['research_category']=="Schools Division")? "selected" : ""?> > Schools Division </option>
                                    <option value="District" <?=($row['research_category']=="District")? "selected" : ""?> > District </option>
                                    <option value="School" <?=($row['research_category']=="School")? "selected" : ""?> > School </option>
                                </select>
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon">Research Type</span>
                                <select name="research_type" id="research_type" class="form-control">
                                    <option value="Action Research" <?=($row['research_type']=="Action Research")? "selected" : ""?>> Action Research </option>
                                    <option value="Basic Research" <?=($row['research_type']=="Basic Research")? "selected" : ""?>> Basic Research </option>
                                </select>
                            </div>
                            </br>
                            <div class="input-group">
						      	<span class="input-group-addon">Research Agenda</span>
                                <select name="research_agenda" id="research_agenda" class="form-control">
                                    <option value="Teaching and Learning" <?=($row['research_agenda']=="Teaching and Learning")? "selected" : ""?> > Teaching and Learning </option>
                                    <option value="Child Protection" <?=($row['research_agenda']=="Child Protection")? "selected" : ""?> > Child Protection </option>
                                    <option value="Human Resource Development" <?=($row['research_agenda']=="Human Resource Development")? "selected" : ""?> > Human Resource Development </option>
                                    <option value="Governance" <?=($row['research_agenda']=="Governance")? "selected" : ""?> > Governance </option>
                                    <option value="DRRM" <?=($row['research_agenda']=="DRRM")? "selected" : ""?> > DRRM </option>
                                    <option value="Gender Development" <?=($row['research_agenda']=="Gender and Development")? "selected" : ""?> > Gender Development </option>
                                    <option value="Inclusive Education" <?=($row['research_agenda']=="Inclusive Education")? "selected" : ""?> > Inclusive Education </option>
                                    <option value="Others" <?=($row['research_agenda']=="Others")? "selected" : ""?> > Others </option>
                                </select>
                            </div>
                            </br>
                            <div class="input-group" >
						      	<span class="input-group-addon">Date Signed</span>
						      	<input id="research_date_published" type="date" class="form-control" min="" name="research_date_published" min="2001-01-01" max="2099-12-31" value="<?=$row['research_date_publish']?>" required>
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">DOI</span>
						      	<input id="research_doi" type="text" class="form-control" name="research_doi" value="<?=$row['research_doi']?>">
						    </div>
						    <br/>
						    
                            <div class="input-group" >
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="research_journal_title" type="text" class="form-control" name="research_journal_title" placeholder="Title of Journal" value="<?=$row['journal_title']?>">
						    </div>
                            <br/>
                            <!-- <div class="input-group">
						      	<span class="input-group-addon">Volume</span>
						      	<input id="journ_vol" type="number" class="form-control" name="journ_vol" placeholder="1" min="1" max="50">
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Issue</span>
						      	<input id="journ_issue" type="number" class="form-control" name="journ_issue" placeholder="1" min="1" max="50">
						    </div>
						    <br> -->
                            <div class="input-group" >
						      	<span class="input-group-addon">Pages</span>
						      	<input id="research_journal_pages" type="text" class="form-control" name="research_journal_pages" value="<?=$row['research_journal_pages']?>">
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Research Abstract</span>
						      	<textarea id="research_abstract" name="research_abstract" rows="4" cols="76" value=""> <?=$row['research_abstract']?> </textarea>
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Research Keywords</span>
						      	<textarea id="research_keywords" name="research_keywords" rows="2" cols="75" value=""> <?=$row['research_keywords']?> </textarea>
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon" style="background-color: #ffb19e;">Research Status</span>
                                <select name="research_status" id="research_status" class="form-control">
                                    <option value="Conducted" <?=($row['research_status']=="Conducted")? "selected" : ""?> > Conducted </option>
                                    <option value="Submitted" <?=($row['research_status']=="Submitted")? "selected" : ""?> > Submitted </option>
                                    <option value="Disseminated" <?=($row['research_status']=="Disseminated")? "selected" : ""?> > Disseminated </option>
                                    <option value="Used" <?=($row['research_status']=="Used")? "selected" : ""?> > Used </option>
                                </select>
						    </div>
						    <br>

						    	<p class="text-justify">Insert the Research File:</p>
						      	<input id="research_file" type="file" class="" name="research_file" value="<?=$row['research_filename']?>" accept="image/*, .pdf, .doc, .txt">
						    <br>
						    <input type = "submit" name = "submit" value = "Add Research">
	  					</form>

	  					<?php
							}
						} else {
							echo "<p> No conducted Research yet.</p>";
						}
						?>

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
