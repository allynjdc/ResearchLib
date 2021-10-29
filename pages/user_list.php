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
			    <div class="col-sm-2 sidenav">
			      	
			    </div>

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-8 center-div body_middle" > 
			    	
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
							<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddUserModal" data-whatever="AddUser">
								Add User
							</button>
						</div>
						

						<!-- Modal For Add User -->
						<div class="modal fade text-justify col-sm-12" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="AddUserModalLabel" aria-hidden="true">
						    <div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title h3 col-sm-10" id="AddUserModalLabel">Add User</h5>
						        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
						          			<span aria-hidden="true">&times;</span>
						        		</button>
						      		</div>
						      		<div class="modal-body">
						        		<form>
						          			<div class="form-group">
						          				<label for="add-user-photo" class="col-form-label">Upload Image:</label>
						          				<input id="add-user-photo" type="file" class="" name="add-user-photo" accept="image/*">
						          			</div>

						          			<div class="form-group">
						            			<label for="user-name" class="col-form-label">First Name:</label>
						            			<input type="text" class="form-control" id="add-user-fname">
						          			</div>
											  <div class="form-group">
						            			<label for="user-name" class="col-form-label">Middle Name:</label>
						            			<input type="text" class="form-control" id="add-user-mname">
						          			</div>
											  <div class="form-group">
						            			<label for="user-name" class="col-form-label">Last Name:</label>
						            			<input type="text" class="form-control" id="add-user-lname">
						          			</div>
						          			<div class="form-group">
									            <label for="user-designation" class="col-form-label">Designation:</label>
									            <input type="text" class="form-control" id="add-user-designation">
						          			</div>
						          			<div class="form-group">
									            <label for="user-station" class="col-form-label">Office / School:</label>
									            <input type="text" class="form-control" id="add-user-office">
						          			</div>
						          			<div class="form-group">
									            <label for="user-email" class="col-form-label">Email:</label>
									            <input type="email" class="form-control" id="add-user-email">
						          			</div>
						          			<div class="form-group">
									            <label for="user-username" class="col-form-label">Username:</label>
									            <input type="text" class="form-control" id="add-user-username">
						          			</div>
						        		</form>
						      		</div>
						      		<div class="modal-footer">
										<p id="add_user_status_msg"></p>
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								        <button type="button" class="btn btn-primary" onclick="addUser()">Add User</button>
						      		</div>
						    	</div>
						  	</div>
						</div>

						<br>
						<!-- For Fetching ---> 
						<?php
						$query = "SELECT * FROM user ORDER BY user_first_name";
						if ($result = $db->query($query)) {
							$profileDir = "../images/profile_pictures/";
							$defaultImg = "default_profile_picture.jpg";

							while ($row = $result->fetch_assoc()) {
								$userFullname = $row['user_first_name']." ".$row['user_middle_name'][0].". ".$row['user_last_name'];
								$userImage = empty($row['user_profile_picture']) ? $defaultImg : $row['user_profile_picture'];

								echo "<div class=\"col-sm-12 text-justify\" >
									<a href=\"user_profile_view.php?userid=".$row['user_id']."\">
										<div class=\"col-sm-12\">
											<div class=\"col-sm-1\" >
												<img class=\"  img-circle \" src=\"".$profileDir.$userImage."\" onerror=\"this.src='".$profileDir.$defaultImg."'\" alt=\"profile\" width=\"70px\" height=\"70px\">
											</div>
											<div class=\"col-sm-7 \" style=\" \">
												<p class=\"h4\" style=\"\">".$userFullname."</p>
												<p class=\"h6\">".$row['user_designation']."<br>". $row['user_office']." <br> </p>	
											</div>
											<div class=\"col-sm-4 text-right h5\" style=\"\">
												<a href=\"#UpdateUserModal\" data-toggle=\"modal\" data-target=\"#UpdateUserModal".$row['user_id']."\" data-whatever=\"UpdateUser\">update</a> 
												&nbsp;&nbsp;|&nbsp;&nbsp; 
												<a href=\"#ResetUserModal\" data-toggle=\"modal\" data-target=\"#ResetUserModal".$row['user_id']."\" data-whatever=\"ResetUser\">reset password</a>
												&nbsp;&nbsp;|&nbsp;&nbsp; 
												<a href=\"#RemoveUserModal\" data-toggle=\"modal\" data-target=\"#RemoveUserModal".$row['user_id']."\" data-whatever=\"RemoveUser\">remove</a>
											</div>
										</div>
									</a>
									<p> &nbsp;</p>
								</div>";
							}
						} else {
							echo "<p> No users yet.</p>";
						}
						?>
					</div>
			    </div>
				<?php
				$query = "SELECT * FROM user ORDER BY user_first_name";
				if ($result = $db->query($query)) {
					while ($row = $result->fetch_assoc()) { ?>

						<!-- Modal For Update User -->
						<div class="modal fade text-justify col-sm-12" id="UpdateUserModal<?=$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="UpdateUserModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title h3 col-sm-10" id="UpdateUserModalLabel">Update User</h5>
										<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form>
											<div class="form-group">
												<label for="user_photo" class="col-form-label">Update Image:</label>
												<input id="update-user-photo-<?=$row['user_id']?>" type="file" class="" name="user_photo" accept="image/*">
											</div>

											<div class="form-group">
												<label for="user-name" class="col-form-label">First Name:</label>
												<input type="text" class="form-control" id="update-user-fname-<?=$row['user_id']?>" value="<?=$row['user_first_name']?>">
											</div>
											<div class="form-group">
												<label for="user-name" class="col-form-label">Middle Name:</label>
												<input type="text" class="form-control" id="update-user-mname-<?=$row['user_id']?>" value="<?=$row['user_middle_name']?>">
											</div>
											<div class="form-group">
												<label for="user-name" class="col-form-label">Last Name:</label>
												<input type="text" class="form-control" id="update-user-lname-<?=$row['user_id']?>" value="<?=$row['user_last_name']?>">
											</div>
											<div class="form-group">
												<label for="user-designation" class="col-form-label">Designation:</label>
												<input type="text" class="form-control" id="update-user-designation-<?=$row['user_id']?>" value="<?=$row['user_designation']?>">
											</div>
											<div class="form-group">
												<label for="user-station" class="col-form-label">Office / School:</label>
												<input type="text" class="form-control" id="update-user-office-<?=$row['user_id']?>" value="<?=$row['user_office']?>">
											</div>
											<div class="form-group">
												<label for="user-email" class="col-form-label">Email:</label>
												<input type="email" class="form-control" id="update-user-email-<?=$row['user_id']?>" value="<?=$row['user_email_address']?>">
											</div>
											<div class="form-group">
												<label for="user-username" class="col-form-label">Username:</label>
												<input type="text" class="form-control" id="update-user-username-<?=$row['user_id']?>" value="<?=$row['user_username']?>">
											</div>
											<input type="hidden" id="update-user-old-photo-<?=$row['user_id']?>" value="<?=$row['user_profile_picture']?>">
										</form>
									</div>
									<div class="modal-footer">
										<p id="update_user_status_msg_<?=$row['user_id']?>"></p>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-primary" onclick="updateUser(<?=$row['user_id']?>)">Update</button>
									</div>
								</div>
							</div>
						</div>

						<!-- Modal(s) for Password Reset -->
						<div class="modal fade text-justify col-sm-12" id="ResetUserModal<?=$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="ResetUserModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title h3 col-sm-10" id="ResetUserModalLabel">Password Reset</h5>
										<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h4> Are you sure you want to reset password of user (<b><?= $row['user_first_name']." ".$row['user_last_name'] ?></b>)? <h4>
									</div>
									<div class="modal-footer">
										<p id="reset_user_status_msg<?=$row['user_id']?>"></p>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="resetPassword(<?=$row['user_id']?>)">Reset</button>
									</div>
								</div>
							</div>
						</div>
						

						<!-- Modal(s) for Remove User -->
						<div class="modal fade text-justify col-sm-12" id="RemoveUserModal<?=$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="RemoveUserModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title h3 col-sm-10" id="RemoveUserModalLabel">Delete User</h5>
										<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h4> Are you sure you want to delete the user (<b><?= $row['user_first_name']." ".$row['user_last_name'] ?></b>)? <h4>
									</div>
									<div class="modal-footer">
										<p id="remove_user_status_msg_<?=$row['user_id']?>"></p>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-danger" onclick="removeUser(<?=$row['user_id']?>)">Delete</button>
									</div>
								</div>
							</div>
						</div>

				<?php
					} // End of while loop
				} // End of IF condition
				?>

			    <!-- RIGHT SIDE NAVIGATION -->
			    <div class="col-sm-2 sidenav">
			    	
			    </div>
		  </div>
		</div>


		<!-- Footer -->
		<!--
		<footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer>
		-->

	</body>

	<script>
		async function uploadImage() {
			let formData = new FormData();
			var file = document.getElementById('add-user-photo').files[0];
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

		function addUser() {

			document.getElementById('add_user_status_msg').innerHTML = ""; // Reset status message
			var isUploadFile = (document.getElementById('add-user-photo').files.length != 0);

			var firstName = document.getElementById('add-user-fname').value;
			var middleName = document.getElementById('add-user-mname').value;
			var lastName = document.getElementById('add-user-lname').value;
			var designation = document.getElementById('add-user-designation').value;
			var office = document.getElementById('add-user-office').value;
			var email = document.getElementById('add-user-email').value;
			var username = document.getElementById('add-user-username').value;
			// Filename is empty in case the user didn't upload any picture or when there's an error during file upload.
			var filename =  (isUploadFile && uploadImage())? document.getElementById('add-user-photo').files[0].name : ""; 
	
			var data = {'fname': firstName, 'mname': middleName, 'lname': lastName, 'designation': designation, 'office': office, 'email': email , 'username': username, 'filename':filename};

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('AddUserModal').style.display = 'none';
						location.reload();
					} else {
						document.getElementById('add_user_status_msg').innerHTML = "Unable to add new user. Please try again." + this.responseText;;
					}
				}
			};
			xmlhttp.open("POST", "../database/add_user.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}

		function updateUser(userId) {

			console.log(userId);
			document.getElementById('update_user_status_msg_' + userId).innerHTML = ""; // Reset status message
			var isUploadFile = (document.getElementById('update-user-photo-' + userId).files.length != 0);

			var firstName = document.getElementById('update-user-fname-' + userId).value;
			var middleName = document.getElementById('update-user-mname-' + userId).value;
			var lastName = document.getElementById('update-user-lname-' + userId).value;
			var designation = document.getElementById('update-user-designation-' + userId).value;
			var office = document.getElementById('update-user-office-' + userId).value;
			var email = document.getElementById('update-user-email-' + userId).value;
			var username = document.getElementById('update-user-username-' + userId).value;
			// filename is the old filename in the case where the user don't want to update picture or when there's an error during file upload.
			var oldFilename = document.getElementById('update-user-old-photo-' + userId).value;
			var filename =  (isUploadFile && uploadImage()) ? document.getElementById('update-user-photo-' + userId).files[0].name : oldFilename; 
	
			var data = {'userid': userId, 'fname': firstName, 'mname': middleName, 'lname': lastName, 'designation': designation, 'office': office, 'email': email , 'username': username, 'filename':filename};
	
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('UpdateUserModal' + userId).style.display = 'none';
						location.reload();
					} else {
						document.getElementById('update_user_status_msg_' + userId).innerHTML = "Unable to update user information. Please try again." + this.responseText;
					}
				}
			};
			xmlhttp.open("POST", "../database/update_user.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}

		function resetPassword(userId) {

			document.getElementById('reset_user_status_msg' + userId).innerHTML = ""; // Reset status message
	
			var password = ""; // Server will provide the password
			var data = { 'userid': userId, 'reset': '1', 'pwd': password };
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						location.reload();
					} else {
						document.getElementById('reset_status_msg').innerHTML = "Unable to reset password.";
					}
				}
			};
			xmlhttp.open("POST", "../database/password_update.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}

		function removeUser(userId) {

			document.getElementById('remove_user_status_msg_' + userId).innerHTML = "";
	
			var data = {'userid': userId };
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('RemoveUserModal' + userId).style.display = 'none';
						location.reload();
					} else {
						document.getElementById('remove_user_status_msg_' + userId).innerHTML = "Unable to remove user." + this.responseText;
					}
				}
			};
			xmlhttp.open("POST", "../database/remove_user.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}
	</script>
</html>
