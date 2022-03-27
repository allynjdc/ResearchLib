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
		<?php 
			@include("navigation.php");
		?>

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
						            			<input type="text" class="form-control" id="add-user-fname" required>
						          			</div>
											  <div class="form-group">
						            			<label for="user-name" class="col-form-label">Middle Name:</label>
						            			<input type="text" class="form-control" id="add-user-mname" required>
						          			</div>
											  <div class="form-group">
						            			<label for="user-name" class="col-form-label">Last Name:</label>
						            			<input type="text" class="form-control" id="add-user-lname" required>
						          			</div>
						          			<div class="form-group">
									            <label for="user-designation" class="col-form-label">Designation:</label>
									            <input type="text" class="form-control" id="add-user-designation" required>
						          			</div>
						          			<div class="form-group">
									            <label for="user-station" class="col-form-label">Office / School:</label>
									            <input type="text" class="form-control" id="add-user-office" required>
						          			</div>
						          			<div class="form-group">
									            <label for="user-email" class="col-form-label">Email:</label>
									            <input type="email" class="form-control" id="add-user-email" required>
						          			</div>
						          			<div class="form-group">
									            <label for="user-username" class="col-form-label">Username:</label>
									            <input type="text" class="form-control" id="add-user-username" required>
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

						// Get current page number
						$pageno = (isset($_GET["pageno"])) ? $_GET["pageno"] : 1; // Default is page 1
						
						// Formula for pagination
						$no_of_records_per_page = 10;
						$offset = ($pageno - 1) * $no_of_records_per_page;

						// Get total number of pages
						$total_pages_query = "SELECT COUNT(*) FROM user";
						$result_count = $db->query($total_pages_query);
						$total_rows = mysqli_fetch_array($result_count)[0];
						$total_pages = ceil($total_rows / $no_of_records_per_page);

						$query = "SELECT * FROM user ORDER BY user_first_name LIMIT $offset, $no_of_records_per_page";
						$counter = 0;
						if ($result = $db->query($query)) {
							$profileDir = "../images/profile_pictures/";
							$defaultImg = "default_profile_picture.jpg";

							while ($row = $result->fetch_assoc()) {
								$userFullname = $row['user_first_name']." ".$row['user_middle_name'][0].". ".$row['user_last_name'];
								$userImage = empty($row['user_profile_picture']) ? $defaultImg : $row['user_profile_picture'];
								$isUserActive = ($row['user_active_state'] == "1");
								$accStatusLabel = $isUserActive ? "<span class=\"label label-success\">active</span>" : "<span class=\"label label-default\">inactive</span>";
								$activateBtn = "";
								if ($isUserActive) {
									$activateBtn = "<a href=\"#ActivateUserModal\" data-toggle=\"modal\" data-target=\"#ActivateUserModal".$row['user_id']."\" data-whatever=\"ActivateUser\"style=\"color: gray;\">deactivate</a>";
								} else {
									$activateBtn = "<a href=\"#ActivateUserModal\" data-toggle=\"modal\" data-target=\"#ActivateUserModal".$row['user_id']."\" data-whatever=\"ActivateUser\" style=\"color: green;\">activate</a>";
								}
				
								echo "<div class=\"col-sm-12 text-justify\" >
									<a href=\"user_profile_view.php?userid=".$row['user_id']."\">
										<div class=\"col-sm-12\">
											<div class=\"col-sm-1\" >
												<img class=\"  img-circle \" src=\"".$profileDir.$userImage."\" onerror=\"this.src='".$profileDir.$defaultImg."'\" alt=\"profile\" width=\"70px\" height=\"70px\">
											</div>
											<div class=\"col-sm-6 \" style=\" \">
												<p class=\"h4\" style=\"\">".$userFullname."&nbsp;&nbsp;".$accStatusLabel."</p>
												<p class=\"h6\">".$row['user_designation']."<br>". $row['user_office']." <br> </p>	
											</div>
											<div class=\"col-sm-5 text-right h5\" style=\"\">
												<a href=\"#UpdateUserModal\" data-toggle=\"modal\" data-target=\"#UpdateUserModal".$row['user_id']."\" data-whatever=\"UpdateUser\">update</a> 
												&nbsp;&nbsp;|&nbsp;&nbsp; 
												<a href=\"#ResetUserModal\" data-toggle=\"modal\" data-target=\"#ResetUserModal".$row['user_id']."\" data-whatever=\"ResetUser\">reset password</a>
												&nbsp;&nbsp;|&nbsp;&nbsp;
												".$activateBtn."
												&nbsp;&nbsp;|&nbsp;&nbsp; 
												<a href=\"#RemoveUserModal\" data-toggle=\"modal\" data-target=\"#RemoveUserModal".$row['user_id']."\" data-whatever=\"RemoveUser\" style=\"color: red;\">remove</a>
											</div>
										</div>
									</a>
									<p> &nbsp;</p>
								</div>";
								$counter = $counter + 1;
							}
							if ($counter == 0) {
								echo "<p> No users yet.</p>";	
							}
						} else {
							echo "<p> No users yet.</p>";
						}
						?>
					</div>
					<div class="text-right">
						<ul class="pagination pagination-sm ">
							<?php
							if ($total_pages > 1) { // No need to do a pagination if there's only one page
				
								$max_displayed_page = 5; // NOTE: This should be an odd number;
								$current_page = $pageno;
								$min_page = 1;
								$max_page = $total_pages;

								// Previous button
								if ($current_page <= 1) {
									echo "<li class='disabled'><a href='#'>Previous</a></li>";
								} else {
									echo "<li><a href='?pageno=".($current_page - 1)."'>Previous</a></li>";
								}

								// Numbered buttons
								// Setup which page numbers to display
								$lower_page = $min_page;
								$upper_page = $max_page;
								if ($total_pages > $max_displayed_page) {
				
									$lower_page = $current_page - floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number
									$upper_page = $current_page + floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number

									if ($lower_page < $min_page) {
										$lower_page = $min_page;
										$upper_page = $lower_page + ($max_displayed_page - 1);
									}

									if ($upper_page > $max_page) {
										$upper_page = $max_page;
										$lower_page = $upper_page - ($max_displayed_page - 1);
									}
								}
								// Display the numbered buttons
								for ($page_num = $lower_page; $page_num <= $upper_page; ++$page_num) {
									if ($current_page == $page_num) {
										echo "<li class='active'><a href='#'>".$page_num."</a></li>";
									} else {
										echo "<li><a href='?pageno=".$page_num."'>".$page_num."</a></li>";
									}
								}

								// Next button
								if ($current_page >= $total_pages) {
									echo "<li class='disabled'><a href='#'>Next</a></li>";
								} else {
									echo "<li><a href='?pageno=".($current_page + 1)."'>Next</a></li>";
								}
							}
							?>
  						</ul>
					</div>
			    </div>
				<?php
				$query = "SELECT * FROM user ORDER BY user_first_name LIMIT $offset, $no_of_records_per_page";
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
						<!-- Modal(s) for Actiate/Deactivate User -->
						<div class="modal fade text-justify col-sm-12" id="ActivateUserModal<?=$row['user_id']?>" tabindex="-1" role="dialog" aria-labelledby="ActivateUserModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title h3 col-sm-10" id="ActivateUserModalLabel"><?= ($row['user_active_state'] == "1") ? "Deactivate User" : "Activate User" ?></h5>
										<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<?php $action = ($row['user_active_state'] == "1") ? "deactivate" : "activate" ?>
										<h4> Are you sure you want to <?=$action?> the account of user (<b><?= ucwords(strtolower($row['user_first_name']))." ".ucwords(strtolower($row['user_last_name'])) ?></b>)? <h4>
									</div>
									<div class="modal-footer">
										<p id="activate_user_status_msg_<?=$row['user_id']?>"></p>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										<?php
											if ($row['user_active_state'] == "1") {
												echo "<button type=\"button\" class=\"btn btn-danger\" onclick=\"activateUser(".$row['user_id'].", false)\">Deactivate</button>";
											} else { 
												echo "<button type=\"button\" class=\"btn btn-success\" onclick=\"activateUser(".$row['user_id'].", true)\">Activate</button>";
											}
										?>
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
										<h4> Are you sure you want to delete the user (<b><?= ucwords(strtolower($row['user_first_name']))." ".ucwords(strtolower($row['user_last_name'])) ?></b>)? <h4>
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

		<br>
		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>

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
		function activateUser(userId, isToActivate) {
			console.log(userId);
			console.log(isToActivate);
			document.getElementById('activate_user_status_msg_' + userId).innerHTML = "";
	
			var action = isToActivate ? 1 : 0;
			var data = {'userid': userId, 'activate' : action };

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('ActivateUserModal' + userId).style.display = 'none';
						location.reload();
					} else {
						var errMsg = isToActivate ? "Unable to activate the user account." : "Unable to deactivate the user account.";
						document.getElementById('activate_user_status_msg_' + userId).innerHTML = errMsg + this.responseText;
					}
				}
			};
			xmlhttp.open("POST", "../database/update_account_state.php", true);
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
