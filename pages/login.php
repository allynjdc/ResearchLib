<?php

session_start();

if (isset($_SESSION['user'])) {
	header("Location:homepage.php"); // If ther user is already logged-in, redirect to the home page
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
		<style>
			/*ToDo: Move this to css file */
			form {
				margin-left: auto;
				margin-top: auto;
				margin-right: auto;
				margin-bottom: auto;
			}
		</style>
	</head>
	<body >
		<!-- Navigation -->
		<?php 
			@include("navigation.php");
		?>

		<div class="container-fluid text-center bg-light" style="background-image: url('../images/bgs.png'); background-position: center; background-repeat: no-repeat; background-size: cover; ">    
		  	
			<!-- MIDDLE CONTENT -->
			<div class="col-sm-12 center-div mx-auto my-container" > 
			    <div class="col-sm-5 sidenav" style="height: auto;">
			    </div>
			    <div class="col-sm-7 center-div"> 
			      	<div class="col-md-12" style="height: 460px;">
			      	</div>
					<div class="col-md-9 col-md-offset-1 form-row align-items-center" style="left:55px; top:-100px">
						<form id="login" method="post">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input type="text" id="uname" name="uname" onkeypress="return enterKeyPress(event);" placeholder="Enter Username" class="form-control"/>
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" id="pwd" name="pwd" onkeypress="return enterKeyPress(event);" placeholder="Enter Password" class="form-control"/>
							</div>
							<br>
							<div class="col-md-12 input-group" >
								<button class="btn-primary" style="cursor: pointer; width: 100%; border-radius: 5px;" type="button" onclick="authAccount()">Login</button>
							</div>
							
						</form>
						<p id="status_msg" style="color: red"></p>
					</div>
			    </div>
		    </div>
		</div>
		<br><br>
		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>

	</body>
	<script>
	function authAccount() {
		document.getElementById('status_msg').innerHTML = ""; // Reset status message
	
		var username = document.getElementById('uname').value;
		var password = document.getElementById('pwd').value;
		var data = { 'uname': username, 'pwd': password };

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if ((this.readyState == 4) && (this.status == 200)) {
				try {
					var response = JSON.parse(this.responseText);
					if (response.success == 1) {
						// Make sure the user updates his/her password (if still using the default password)
						if (response.pwdState == "0") window.location = "user_password_change.php"; 
						else window.location = "homepage.php";
					} else {
						document.getElementById('pwd').value = ""; // Reset password entered by the user
						document.getElementById('status_msg').innerHTML = response.errMsg;
					}

				} catch (error) {
					throw Error;
				}
			}
		};
		xmlhttp.open("POST", "../database/authenticate.php", true);
		xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
		xmlhttp.send(JSON.stringify(data));
	}

	function enterKeyPress(ev) {
		// Look for window.event in case event isn't passed in
		ev = ev || window.event;
		if (ev.keyCode == 13) {
			authAccount();
			return false;
		}
		return true;
	}
	</script>
</html>