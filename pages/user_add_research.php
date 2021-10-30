<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

if (isset($_POST['submit'])){

	$user_id 	= $_POST['research_user_id'];
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

	$query = "INSERT INTO research_output (research_id, research_title, research_office, research_category, research_type, research_agenda, research_date_publish, research_doi, research_journal_id, research_journal_pages, research_abstract, research_status, research_keywords, research_filename, research_filepath)
            VALUES (NULL, '$title', '$office', '$category', '$type', '$agenda', '$date', '$doi', '2', '$pages', '$abstract', '$status', '$keywords', '$filename', '$location')";

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
                    	<h3> Upload Research </h3>
                    	<br>
                    	<form id="add_researcher_form" target="_SELF" method="POST" enctype="multipart/form-data">
                    		<input id="research_user_id" type="hidden" class="form-control" name="research_user_id" value="<?=$_SESSION['userid']?>">
						    <div class="input-group">
						      	<span class="input-group-addon">Title</span>
						      	<input id="research_title" type="text" class="form-control" name="research_title" placeholder="Research Title">
						    </div>
						    <br>
							<label id="researchers_label">Researchers: </label> </br>
							<select name="researchers" id="researchers_selection" class="form-control-">
								<option value=""></option> <!-- defuault option -->
								<?php
									$query = "SELECT * FROM researcher";
									if ($result = $db->query($query)) {
										while ($row = $result->fetch_assoc()) {
											echo "<option value=\"".$row['researcher_id']."\">". $row['researcher_first_name']." ".$row['researcher_last_name']."</option>";
										}
									} else {
										echo "<option value=''>Error</option>";
									}
								?>
							</select>
							<button type="button" id="add_name_btn" onclick="addResearcherName()" class="btn btn-outline-primary btn-sm" style="color:green;">+ Add </button>

                            <br/>

                            <div class="input-group">
						      	<span class="input-group-addon">School / Office</span>
						      	<input id="research_office" type="text" class="form-control" name="research_office" placeholder="ex. Tagum National Trade School">
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
						      	<input id="research_date_published" type="date" class="form-control" min="" name="research_date_published" min="2001-01-01" max="2099-12-31" required>
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">DOI</span>
						      	<input id="research_doi" type="text" class="form-control" name="research_doi" placeholder="00.0000/0000000000000-0">
						    </div>
						    <br/>
						    
                            <div class="input-group" >
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="research_journal_title" type="text" class="form-control" name="research_journal_title" placeholder="Title of Journal">
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
						      	<input id="research_journal_pages" type="text" class="form-control" name="research_journal_pages" placeholder="xx-xx">
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Research Abstract</span>
						      	<textarea id="research_abstract" name="research_abstract" rows="4" cols="76"> </textarea>
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Research Keywords</span>
						      	<textarea id="research_keywords" name="research_keywords" rows="2" cols="75"> </textarea>
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
						      	<input id="research_file" type="file" class="" name="research_file" accept="image/*, .pdf, .doc, .txt">
						    <br>
						    <input type="submit" name="submit" value="Add Research">
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
	<script>
		function removeSelection(researcherId)
		{
			var nodeToDelete = document.getElementById("wrapper_" + researcherId);
			nodeToDelete.parentNode.removeChild(nodeToDelete);
		}

		function addResearcherName() {
			var selectedResearcher = document.getElementById("researchers_selection");
			var index = selectedResearcher.selectedIndex;
			if (selectedResearcher.value == "") {
				alert("Please select a researcher to add");
				return;
			}

			// <input>
			// ToDo: If possible, don't put the researcher name in an input element. Maybe just in a div element with styling.
			//		 Then the input element will be hidden, setting researcer id as the input's value.
			var inputNode = document.createElement("input");
			inputNode.setAttribute("type", "text");
			inputNode.setAttribute("readonly", true);
			inputNode.setAttribute("name", "researcher_name[]");
			inputNode.setAttribute("value", selectedResearcher.options[index].text);

			// <button> a button for deleting/removing the researcher
			var deleteNode = document.createElement("button");
			deleteNode.type = "button";
			deleteNode.id = "delete_" + selectedResearcher.value;
			deleteNode.setAttribute("onclick", "removeSelection(" + selectedResearcher.value + ")");
			deleteNode.setAttribute("class", "btn btn-sm");
			deleteNode.setAttribute("style", "color: red;");
			var textNode = document.createTextNode("x");
			deleteNode.appendChild(textNode);
	
			// <div> this element wraps the input element and button. So it is easier to remove them later on.
			var divWrapper = document.createElement("div");
			divWrapper.id = "wrapper_" + selectedResearcher.value;
			divWrapper.appendChild(inputNode);
			divWrapper.appendChild(deleteNode);

			var addForm = document.getElementById("add_researcher_form");
			var selectionList = document.getElementById("researchers_selection");
			addForm.insertBefore(divWrapper, selectionList);

			selectedResearcher.value = ""; // Reset the selection to empty after adding new researcher name

			// ToDo: Avoid duplicate researcher name by disabling the options that are already selected in the selected tag
		}
	</script>
</html>
