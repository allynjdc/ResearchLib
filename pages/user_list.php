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
		<nav class="navbar navbar-default"> <!-- navbar-inverse -->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand " href="homepage.php">
			      		<p class="title_brand_nav"> Division Digital Research Library </p>
			      	</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="memorandum.php">Memorandums</a></li>
			    	<li><a href="journals.php">Journals</a></li>
                    <li><a href="help.php">Help</a></li>
			      	<li class="dropdown">
                        <a href="#" class="dropbtn"><?= $_SESSION['user'] ?></a>
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
			    <div class="col-sm-8 center-div" style="background-color: white; "> 
			    	
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
						          				<label for="user_photo" class="col-form-label">Upload Image:</label>
						          				<input id="add-user-photo" type="file" class="" name="user_photo" accept="image/*">
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
						$query = "SELECT * FROM user ORDER BY first_name";
						if ($result = $db->query($query)) {
							$profileDir = "../images/profile_pictures/";
							$defaultImg = "default_profile_picture.jpg";

							while ($row = $result->fetch_assoc()) {
								$userFullname = $row['first_name']." ".$row['middle_name'][0].". ".$row['last_name'];
								$userImage = empty($row['profile_picture']) ? $defaultImg : $row['profile_picture'];

								echo "<div class=\"col-sm-12 text-justify\" >
									<a href=\"user_profile_view.php?userid=".$row['user_id']."\">
										<div class=\"col-sm-12\">
											<div class=\"col-sm-1\" >
												<img class=\"  img-circle \" src=\"".$profileDir.$userImage."\" alt=\"profile picture\" width=\"70px\" height=\"70px\">
											</div>
											<div class=\"col-sm-7 \" style=\" \">
												<p class=\"h4\" style=\"\">".$userFullname."</p>
												<p class=\"h6\">".$row['designation']."<br>". $row['office']." <br> </p>	
											</div>
											<div class=\"col-sm-4 text-right h5\" style=\"\">
												<a href=\"#UpdateUserModal\" data-toggle=\"modal\" data-target=\"#UpdateUserModal\" data-whatever=\"UpdateUser\">update</a> 
												&nbsp;&nbsp;|&nbsp;&nbsp; 
												<a href=\"\">reset password</a>
												&nbsp;&nbsp;|&nbsp;&nbsp; 
												<a href=\"\">remove</a>
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
						<!--
						<div class="col-sm-12 text-justify" >
							<a href="">
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
										<a href="#UpdateUserModal" data-toggle="modal" data-target="#UpdateUserModal" data-whatever="UpdateUser">update</a> 
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">reset password</a>
										&nbsp;&nbsp;|&nbsp;&nbsp; 
										<a href="">remove</a>
									</div>
								</div>
							</a>
							<p> &nbsp;</p>
						</div>
						-->

					</div>
			    </div>



			    <!-- Modal For Update User -->
				<div class="modal fade text-justify col-sm-12" id="UpdateUserModal" tabindex="-1" role="dialog" aria-labelledby="UpdateUserModalLabel" aria-hidden="true">
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
				          				<label for="user_photo" class="col-form-label">Upload Image:</label>
				          				<input id="user_photo" type="file" class="" name="user_photo" accept="image/*">
				          			</div>

				          			<div class="form-group">
				            			<label for="user-name" class="col-form-label">Name:</label>
				            			<input type="text" class="form-control" id="user-name">
				          			</div>
				          			<div class="form-group">
							            <label for="user-designation" class="col-form-label">Designation:</label>
							            <input type="text" class="form-control" id="user-designation">
				          			</div>
				          			<div class="form-group">
							            <label for="user-station" class="col-form-label">Office / School:</label>
							            <input type="text" class="form-control" id="user-station">
				          			</div>
				          			<div class="form-group">
							            <label for="user-email" class="col-form-label">Email:</label>
							            <input type="email" class="form-control" id="user-email">
				          			</div>
				          			<div class="form-group">
							            <label for="user-username" class="col-form-label">Username:</label>
							            <input type="text" class="form-control" id="user-username">
				          			</div>
				        		</form>
				      		</div>
				      		<div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary">Add User</button>
				      		</div>
				    	</div>
				  	</div>
				</div>


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
		function addUser() {
			alert("Hello");
			document.getElementById('add_user_status_msg').innerHTML = ""; // Reset status message
		
			var firstName = document.getElementById('add-user-fname').value;
			var middleName = document.getElementById('add-user-mname').value;
			var lastName = document.getElementById('add-user-lname').value;
			var designation = document.getElementById('add-user-designation').value;
			var office = document.getElementById('add-user-office').value;
			var email = document.getElementById('add-user-email').value;
			var username = document.getElementById('add-user-username').value;
	
			var data = {'fname': firstName, 'mname': middleName, 'lname': lastName, 'designation': designation, 'office': office, 'email': email , 'username': username };

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('AddUserModal').style.display = 'none';
						location.reload();
					} else {
						document.getElementById('add_user_status_msg').innerHTML = "Unable to add new user. Please try again.";
					}
				}
			};
			xmlhttp.open("POST", "../database/add_user.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}
	</script>
</html>
