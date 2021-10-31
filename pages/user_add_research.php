<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

if (isset($_POST['submit'])){

	$user_id 	= $_POST['research_user_id'];
	$title 		= $_POST['research_title'];
	$researchers = $_POST['researcher_id'];
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

	$query1 = "INSERT INTO research_output (research_id, research_title, research_office, research_category, research_type, research_agenda, research_date_publish, research_doi, research_journal_id, research_journal_pages, research_abstract, research_status, research_keywords, research_filename, research_filepath)
            VALUES (NULL, '$title', '$office', '$category', '$type', '$agenda', '$date', '$doi', '2', '$pages', '$abstract', '$status', '$keywords', '$filename', '$location')";

	$query2 = "INSERT INTO research_creation (creation_researcher_id, creation_research_id) VALUES";
	$values = [];
	foreach($researchers as $rId) {
		$values[] = "($rId, LAST_INSERT_ID())";
	}
	$query2 .= join(',', $values);

	// Note: Order matters here. quiery1 should be first so that the "LAST_INSERT_ID()" value in query2 is correct.
	if ($db->query($query1) === TRUE && $db->query($query2) === TRUE) {
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

		<style>
			fieldset.scheduler-border {
				border: solid 1px #DDD !important;
				padding: 0 10px 10px 10px;
				border-bottom: none;
			}

			legend.scheduler-border {
				width: auto !important;
				text-align: left;
				border: none;
				font-size: 14px;
			}
			.remove-from-list {
				float:right;
				display:inline-block;
				padding:2px 5px;
			}
			.remove-from-list:hover {
				float:right;
				display:inline-block;
				padding:2px 5px;
				color: red;
				cursor: pointer;
			}
			
		</style>
		
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
						      	<input id="research_title" type="text" class="form-control" name="research_title" placeholder="Research Title" required>
						    </div>
						    <br>
							<fieldset class="scheduler-border">
								<legend class="scheduler-border">Researchers</legend>
								
								<!-- This list displays the researchers that are selected/added by user. We hide this list by default. Show it only when there's an item on the list -->
								<ul class="list-group list-group-flush" id="researcher_list_display" style="display:none;"></ul>
				
								<div class="input-group">
									<select name="researchers" id="researchers_selection" class="form-control">
										<option value="" selected disabled hidden>-- select a researcher --</option> <!-- defuault option -->
										<?php
											$query = "SELECT * FROM researcher ORDER BY researcher_first_name";
											if ($result = $db->query($query)) {
												while ($row = $result->fetch_assoc()) {
													$firstName = strtolower($row['researcher_first_name']);
													$middleInitial = $row['researcher_middle_name'][0];
													$lastName =  strtolower($row['researcher_last_name']);
													$fullName = ucwords($firstName." ".$middleInitial.". ".$lastName);
													echo "<option value=\"".$row['researcher_id']."\">".$fullName."</option>";
												}
											} else {
												echo "<option value=''>Error</option>";
											}
										?>
									</select>
									<div class="input-group-btn">
										<button type="button" id="add_name_btn" onclick="addResearcherName()" class="btn btn-default">+ Add </button>
									</div>
								</div>
							</fieldset>
							<br/>

                            <div class="input-group">
						      	<span class="input-group-addon">School / Office</span>
						      	<input id="research_office" type="text" class="form-control" name="research_office" placeholder="ex. Tagum National Trade School" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Research Category</span>
                                <select name="research_category" id="research_category" class="form-control" required>
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
                                <select name="research_type" id="research_type" class="form-control" required>
                                    <option value="Action Research"> Action Research </option>
                                    <option value="Basic Research"> Basic Research </option>
                                </select>
                            </div>
                            </br>
                            <div class="input-group">
						      	<span class="input-group-addon">Research Agenda</span>
                                <select name="research_agenda" id="research_agenda" class="form-control" required>
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
						      	<input id="research_doi" type="text" class="form-control" name="research_doi" placeholder="00.0000/0000000000000-0" required>
						    </div>
						    <br/>
						    
                            <div class="input-group" >
						      	<span class="input-group-addon">Journal Title</span>
								<select name="research_journal_title" id="research_journal_title" class="form-control" required>
									<option value="" disabled selected>-- select a journal --</option>
									<?php
										$query = "SELECT * FROM research_journal ORDER BY journal_title";
										if ($result = $db->query($query)) {
											while ($row = $result->fetch_assoc()) {
												echo "<option value=\"".$row['journal_id']."\">". $row['journal_title']."</option>";
											}
										} else {
											echo "<option value=''>Error</option>";
										}
									?>
								</select>
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Pages</span>
						      	<input id="research_journal_pages" type="text" class="form-control" name="research_journal_pages" placeholder="xx-xx" required>
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Research Abstract</span>
						      	<textarea id="research_abstract" name="research_abstract" rows="4"  class="md-textarea form-control"></textarea>
						      	<!-- cols="76" -->
						    </div>
                            <br/>
                            <div class="input-group" >
						      	<span class="input-group-addon">Research Keywords</span>
						      	<textarea id="research_keywords" name="research_keywords" rows="2"  class="md-textarea form-control"> </textarea>
						      	<!-- cols="75" -->
						    </div>
                            <br/>
                            <div class="input-group">
						      	<span class="input-group-addon" style="background-color: #ffb19e;">Research Status</span>
                                <select name="research_status" id="research_status" class="form-control" required>
                                    <option value="Conducted"> Conducted </option>
                                    <option value="Submitted"> Submitted </option>
                                    <option value="Disseminated"> Disseminated </option>
                                    <option value="Used"> Used </option>
                                </select>
						    </div>
						    <br>

						    	<p class="text-justify">Insert the Research File:</p>
						      	<input id="research_file" type="file" class="" name="research_file" accept="image/*, .pdf, .doc, .txt" required>
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
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div>

	</body>
	<script>
		function removeSelection(researcherId)
		{
			// Remove from the list
			var listItemToDelete = document.getElementById("researcher_list_" + researcherId);
			listItemToDelete.parentNode.removeChild(listItemToDelete);

			// Remove the hidden input
			var inputToDelete = document.getElementById("reseacher_input_" + researcherId);
			inputToDelete.parentNode.removeChild(inputToDelete);

			// Show the list if there are still items left. Otherwise, hide.
			var researcherList = document.getElementById("researcher_list_display");
			var displayList = researcherList.children.length !== 0 ? 'block' : 'none';
			researcherList.style.display = displayList;
		}

		function addResearcherName() {
			var selectedResearcher = document.getElementById("researchers_selection");
			var index = selectedResearcher.selectedIndex;
			if (selectedResearcher.value == "") { 			// Require the user to select a researcher
				alert("Please select a researcher to add");
				return;
			}
	
			// Create a list element: 
			var listItemNode = document.createElement("li");
			listItemNode.setAttribute("class", "list-group-item");
			listItemNode.setAttribute("id", "researcher_list_" + selectedResearcher.value);
			var listText = document.createTextNode(selectedResearcher.options[index].text);
			var closeBtnNode = document.createElement("span");
			closeBtnNode.setAttribute("class", "remove-from-list pointer");
			closeBtnNode.setAttribute("onclick", "removeSelection(" + selectedResearcher.value + ")" );
			closeBtnNode.innerHTML = "&#10006;";  // The "x" character
			listItemNode.appendChild(listText);
			listItemNode.appendChild(closeBtnNode);

			// Add the new list item to the list so we can display it
			document.getElementById("researcher_list_display").appendChild(listItemNode);
			document.getElementById("researcher_list_display").setAttribute("style", "display: block;");

			// Create hidden input element where the value is the researcher id
			var inputNode = document.createElement("input");
			inputNode.setAttribute("type", "text");
			inputNode.setAttribute("hidden", true);
			inputNode.setAttribute("name", "researcher_id[]");
			inputNode.setAttribute("id", "reseacher_input_" + selectedResearcher.value);
			inputNode.setAttribute("value", selectedResearcher.value);

			// Add the new hidden input the form
			document.getElementById("add_researcher_form").appendChild(inputNode);

			 // Reset the selection to empty after adding new researcher name
			selectedResearcher.value = "";

			// ToDo: Avoid duplicate researcher name by disabling the options that are already selected in the selected tag
		}
	</script>
</html>
