<?php
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

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
                    <h3> New Password </h3>
                    <p> Hello <b><?= $_SESSION['user'] ?></b>!</p>

                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="newpwd">New Password:</label>
                            <div class="col-sm-4">
                            <input type="password" class="form-control" onkeyup="validatePasswords()" id="newpwd" name="newpwd" placeholder="Enter your new password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="confirmpwd">Confirm Password:</label>
                            <div class="col-sm-4">
                            	<input type="password" class="form-control" onkeyup="validatePasswords()" id="confirmpwd" name="newpwd" placeholder="Enter your new password to confirm" required>
                            </div>
                        </div>
						<input type="hidden" id="uname" name="uname" value="<?= $_SESSION['user'] ?>" />
                        <button class="btn-primary" type="button" onclick="updatePassword(<?= $_SESSION['userid'] ?>)">Proceed to homepage</button>
                    </form>
					<p id="update_status_msg"></p>
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
		function validatePasswords() {
			var newPassword = document.getElementById('newpwd').value;
			var confirmPassword = document.getElementById('confirmpwd').value;

			if ((newPassword === "") || (confirmPassword === "")) {
				document.getElementById('update_status_msg').innerHTML = "New Password or Confirm Password must not be empty.";
				document.getElementById('update_status_msg').style.color = "red";
				return false;
			} else if (newPassword === confirmPassword) {
				document.getElementById('update_status_msg').innerHTML = "New Password and Confirm Password are now match.";
				document.getElementById('update_status_msg').style.color = "green";
				return true;
			} else {
				document.getElementById('update_status_msg').innerHTML = "New Password and Confirm Password must be match.";
				document.getElementById('update_status_msg').style.color = "red";
				return false;
			}
		}
		function updatePassword(userId) {
			document.getElementById('update_status_msg').innerHTML = ""; // Reset status message

			if (!validatePasswords()) return; // Early exit when new and confirm passwords are not valid.
		
			//var username = document.getElementsByName('uname')[0].value;
			var password = document.getElementById('newpwd').value;
			var data = { 'userid': userId, 'reset': '0', 'pwd': password };
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						window.location="homepage.php";
					} else {
						document.getElementById('update_status_msg').innerHTML = "Unable to update password.";
						document.getElementById('update_status_msg').style.color = "red";
					}
				}
			};
			xmlhttp.open("POST", "../database/password_update.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}
    </script>
</html>
	