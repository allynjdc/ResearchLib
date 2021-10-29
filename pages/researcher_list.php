<?php
include "../database/db_config.php";
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
			    <ul class="nav title_brand navbar-nav navbar-right">
			    	<li class="title_brand" ><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand" ><a class="title_brand" href="journals.php">Journals</a></li>
			      	<?php
						if (!isset($_SESSION['user'])) {
							echo "<li class=\"title_brand\" ><a class=\"title_brand\" href=\"login.php\">Login</a></li>";
						} else {
							echo "<li class=\"dropdown title_brand\" >
									<a href=\"#\" class=\"title_brand dropbtn\">" . $_SESSION['user'] . "</a>
									<div class=\"dropdown-content\">
										<a href=\"user_profile_view.php\">View Profile</a>
										<a href=\"user_profile_update.php\">Edit Profile</a>
										<a href=\"logout.php\">Log out</a>
									</div>
								</li>";
						}
					?>
			    </ul>
		  	</div>
		</nav>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">

		  		<!-- LEFT SIDE NAVIGATION -->
			    <div class="col-sm-2 sidenav">
			      	
			    </div>

			    <!-- MIDDLE CONTENT -->
			     <div class="col-sm-8 center-div body_middle"> 
			    	
			      	<div class="center_content" >
				    	<br>
				    	<!-- <div class="col-md-10 form-row align-items-center" >
							<form action="/action_page.php" >
	    						<div class="input-group" >
	     							<input type="text" class="form-control" placeholder="Search" name="search" style="height: 40px;">
	      							<div class="input-group-btn" >
	       								<button class="btn btn-default" type="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
	      							</div>
	    						</div>
	 						</form>
						</div>
						<br><br><hr> -->
						<div class="text-justify">
							<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddResearcherModal" data-whatever="AddResearcher">
								Add Researcher
							</button>
						</div>
						

						<!-- Modal For Add Researcher -->
						<div class="modal fade text-justify col-sm-12" id="AddResearcherModal" tabindex="-1" role="dialog" aria-labelledby="AddResearcherModalLabel" aria-hidden="true">
						    <div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title h3 col-sm-10" id="AddResearcherModalLabel">Add Researcher</h5>
						        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
						          			<span aria-hidden="true">&times;</span>
						        		</button>
						      		</div>
						      		<div class="modal-body">
						        		<form>
						        			<input id="researcher_user" type="hidden" value="<?= $_SESSION['userid'] ?>" name="researcher_user">
						          			<div class="form-group">
						          				<label for="researcher_photo" class="col-form-label">Upload Image:</label>
						          				<input id="researcher_photo" type="file" class="" name="researcher_photo" accept="image/*">
						          			</div>

						          			<div class="form-group">
						            			<label for="researcher_fname" class="col-form-label">First Name:</label>
						            			<input type="text" class="form-control" id="researcher_fname">
						          			</div>
						          			<div class="form-group">
						            			<label for="researcher_mname" class="col-form-label">Middle Name:</label>
						            			<input type="text" class="form-control" id="researcher_mname">
						          			</div>
						          			<div class="form-group">
						            			<label for="researcher_lname" class="col-form-label">Last Name:</label>
						            			<input type="text" class="form-control" id="researcher_lname">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher_designation" class="col-form-label">Designation:</label>
									            <input type="text" class="form-control" id="researcher_designation">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher_station" class="col-form-label">Office / School:</label>
									            <input type="text" class="form-control" id="researcher_station">
						          			</div>
						          			<div class="form-group">
									            <label for="researcher_email" class="col-form-label">Email:</label>
									            <input type="email" class="form-control" id="researcher_email">
						          			</div>
						          			<!-- <div class="form-group">
									            <label for="researcher_username" class="col-form-label">Username:</label>
									            <input type="text" class="form-control" id="researcher_username">
						          			</div> -->
						        		</form>
						      		</div>
						      		<div class="modal-footer">
						      			<p id="add_researcher_status_msg"></p>
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								        <button type="button" class="btn btn-primary" onclick="addResearcher()">Add Researcher</button>
						      		</div>
						    	</div>
						  	</div>
						</div>

						<br>
						
						<!-- For Fetching ---> 
						
						<!-- <div class="col-sm-12 text-justify" >
							<a href="user_profile_researcher.php"> 
								<div class="col-sm-12">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/calcaben.png" alt="Calcaben" width="70px" height="70px">
									</div>
									<div class="col-sm-7 " style=" ">
										<p class="h4" style=""> 
											ALLYN JOY D. CALCABEN
										</p>
										<p class="h6">
											Special Science Teacher I 
											<br>
											Tagum National Trade Schoool 
											<br>
										</p>	
									</div>
									<div class="col-sm-4 text-right h5" style="">
										<a href="#UpdateResearcherModal" data-toggle="modal" data-target="#UpdateResearcherModal" data-whatever="UpdateResearcher">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div> -->

						<?php
						$query = "SELECT * FROM researcher ORDER BY researcher_first_name";
						if ($result = $db->query($query)) {
							$profileDir = "../images/profile_pictures/";
							$defaultImg = "default_profile_picture.jpg";

							while ($row = $result->fetch_assoc()) {
								$userFullname = $row['researcher_first_name']." ".$row['researcher_middle_name'][0].". ".$row['researcher_last_name'];
								$userImage = empty($row['researcher_profile_picture']) ? $defaultImg : $row['researcher_profile_picture'];

								echo "
									<div class=\"col-sm-12 text-justify\" >
										<a href=\"user_profile_researcher.php?id=".$row['researcher_id']."\"> 
											<!-- padulong sa profile page sa user --->
											<div class=\"col-sm-12\">
												<div class=\"col-sm-1\" >
													<img class=\"img-circle\" src=\"".$profileDir.$userImage."\" alt=\"".$userFullname."\" width=\"70px\" height=\"70px\">
												</div>
												<div class=\"col-sm-7 \" style=\" \">
													<p class=\"h4\" style=\" \"> 
														".ucwords(strtolower($userFullname))."
													</p>
													<p class=\"h6\">
														".ucwords(strtolower($row['researcher_designation']))." 
														<br>
														".ucwords(strtolower($row['researcher_office']))." 
														<br>
													</p>	
												</div>
												<div class=\"col-sm-4 text-right h5\" style=\" \">
													<a href=\"#UpdateResearcherModal\" data-toggle=\"modal\" data-target=\"#UpdateResearcherModal".$row['researcher_id']."\" data-whatever=\"UpdateResearcher\">update</a> 
													&nbsp;&nbsp;|&nbsp;&nbsp; 
													<a href=\" \">remove</a>
												</div>
											</div>
										</a>
										<p> &nbsp;</p>
									</div>
								";
							
						?>
				      
					    <!-- Modal For Update Researcher -->
						<div class="modal fade text-justify col-sm-12" id="UpdateResearcherModal<?=$row['researcher_id']?>" tabindex="-1" role="dialog" aria-labelledby="UpdateResearcherModalLabel" aria-hidden="true">
						    <div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title h3 col-sm-10" id="UpdateResearcherModalLabel">Update Researcher</h5>
						        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
						          			<span aria-hidden="true">&times;</span>
						        		</button>
						      		</div>
									<div class="modal-body">
						        		<form>
						        			<input id="UPDATE_researcher_user<?=$row['researcher_id']?>" type="hidden" value="<?=$row['researcher_user_id'] ?>" name="researcher_user">
						          			<input type="hidden" id="UPDATE_researcher_old_photo<?=$row['researcher_id']?>" value="<?=$row['researcher_profile_picture']?>">
						          			<div class="form-group">
						          				<label for="UPDATE_researcher_photo<?=$row['researcher_id']?>" class="col-form-label">Upload Image:</label>
						          				<input id="UPDATE_researcher_photo<?=$row['researcher_id']?>" type="file" class="" name="UPDATE_researcher_photo<?=$row['researcher_id']?>" accept="image/*" value="<?=$row['researcher_profile_picture']?>">
						          			</div>

						          			<div class="form-group">
						            			<label for="UPDATE_researcher_fname<?=$row['researcher_id']?>" class="col-form-label" >First Name:</label>
						            			<input type="text" class="form-control" id="UPDATE_researcher_fname<?=$row['researcher_id']?>" value="<?=$row['researcher_first_name']?>">
						          			</div>
						          			<div class="form-group">
						            			<label for="UPDATE_researcher_mname<?=$row['researcher_id']?>" class="col-form-label" >Middle Name:</label>
						            			<input type="text" class="form-control" id="UPDATE_researcher_mname<?=$row['researcher_id']?>" value="<?=$row['researcher_middle_name']?>">
						          			</div>
						          			<div class="form-group">
						            			<label for="UPDATE_researcher_lname<?=$row['researcher_id']?>" class="col-form-label" >Last Name:</label>
						            			<input type="text" class="form-control" id="UPDATE_researcher_lname<?=$row['researcher_id']?>" value="<?=$row['researcher_last_name']?>">
						          			</div>
						          			<div class="form-group">
									            <label for="UPDATE_researcher_designation<?=$row['researcher_id']?>" class="col-form-label" >Designation:</label>
									            <input type="text" class="form-control" id="UPDATE_researcher_designation<?=$row['researcher_id']?>" value="<?=$row['researcher_designation']?>">
						          			</div>
						          			<div class="form-group">
									            <label for="UPDATE_researcher_station<?=$row['researcher_id']?>" class="col-form-label" >Office / School:</label>
									            <input type="text" class="form-control" id="UPDATE_researcher_station<?=$row['researcher_id']?>" value="<?=$row['researcher_office']?>">
						          			</div>
						          			<div class="form-group">
									            <label for="UPDATE_researcher_email<?=$row['researcher_id']?>" class="col-form-label" >Email:</label>
									            <input type="email" class="form-control" id="UPDATE_researcher_email<?=$row['researcher_id']?>" value="<?=$row['researcher_email']?>">
						          			</div>
						          			<!-- <div class="form-group">
									            <label for="researcher_username" class="col-form-label">Username:</label>
									            <input type="text" class="form-control" id="researcher_username">
						          			</div> -->
						        		</form>
						      		</div>
						      		<div class="modal-footer">
						      			<p id="update_researcher_status_msg"></p>
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								        <button type="button" class="btn btn-primary" onclick="updateResearcher(<?=$row['researcher_id']?>)">Update Researcher</button>
						      		</div>
						    	</div>
				  			</div>
						</div>


				      	<?php 

				      		}

						} else {
							echo "<p> No users yet.</p>";
						}

						?>
					</div>
			    </div>


			    <!-- RIGHT SIDE NAVIGATION -->
			    <div class="col-sm-2 sidenav">
			    	
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>

	</body>



	<script>
		async function uploadImage(file) {
			let formData = new FormData();
			formData.append("file", file);
			const response = await fetch('../database/upload_image.php', {
								method: "POST",
								body: formData
							});
			// ToDo: Make sure the filename of the image uploaded by user is unique.
			if (response.statusText != "OK") {
			//if (response.responseText != "OK") {
				alert("Unable to upload the image. Reason: " + response.responseText);
				return false;
			}
			return true;
		}

		function addResearcher() {
			document.getElementById('add_researcher_status_msg').innerHTML = ""; // Reset status message
			
			var rUser = document.getElementById('researcher_user').value;
			var firstName = document.getElementById('researcher_fname').value;
			var middleName = document.getElementById('researcher_mname').value;
			var lastName = document.getElementById('researcher_lname').value;
			var designation = document.getElementById('researcher_designation').value;
			var office = document.getElementById('researcher_station').value;
			var email = document.getElementById('researcher_email').value;

			// Filename is empty in case the user didn't upload any picture or when there's an error during file upload.
			var isUploadFile = (document.getElementById('researcher_photo').files.length != 0);
			if(!isUploadFile || firstName == "" || lastName == "" || email == "" || office == "" || designation == ""){
				document.getElementById('add_memo_status_msg').style.color = 'red';
				document.getElementById('add_memo_status_msg').innerHTML = "Provide all the needed information. Please try again."+this.responseText;
				return ;
			}			

			var file =  document.getElementById('researcher_photo').files[0];
			var PhotoFile = (uploadImage(file)) ? file.name : "";
	
			var data = {'user': rUser, 'fname': firstName, 'mname': middleName, 'lname': lastName, 'designation': designation, 'office': office, 'email': email , 'filename':PhotoFile};
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('AddResearcherModal').style.display = 'none';
						location.reload();
					} else {
						document.getElementById('add_researcher_status_msg').innerHTML = "Unable to add new researcher. Please try again." + this.responseText;;
					}
				}
			};
			xmlhttp.open("POST", "../database/add_researcher.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}

		function updateResearcher(researcherId) {
			console.log(researcherId);
			document.getElementById('update_researcher_status_msg').innerHTML = ""; // Reset status message
			var isUploadFile = (document.getElementById('UPDATE_researcher_photo' + researcherId).files.length != 0);

			var rUser = document.getElementById('UPDATE_researcher_user'+researcherId).value;
			var firstName = document.getElementById('UPDATE_researcher_fname'+researcherId).value;
			var middleName = document.getElementById('UPDATE_researcher_mname'+researcherId).value;
			var lastName = document.getElementById('UPDATE_researcher_lname'+researcherId).value;
			var designation = document.getElementById('UPDATE_researcher_designation'+researcherId).value;
			var office = document.getElementById('UPDATE_researcher_station'+researcherId).value;
			var email = document.getElementById('UPDATE_researcher_email'+researcherId).value;

			// Filename is empty in case the user didn't upload any picture or when there's an error during file upload.
			var oldPhoto = document.getElementById('UPDATE_researcher_old_photo'+researcherId).value;
			var file =  document.getElementById('UPDATE_researcher_photo'+researcherId).files[0];
			var PhotoFile = (isUploadFile && uploadImage(file)) ? file.name : oldPhoto;
			
			var data = {'rID':researcherId, 'user': rUser, 'fname': firstName, 'mname': middleName, 'lname': lastName, 'designation': designation, 'office': office, 'email': email , 'filename':PhotoFile};
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('UpdateResearcherModal'+researcherId).style.display = 'none';
						location.reload();
					} else {
						document.getElementById('update_researcher_status_msg').innerHTML = "Unable to add new researcher. Please try again." + this.responseText;;
					}
				}
			};
			xmlhttp.open("POST", "../database/update_researcher.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}


	</script>


</html>

