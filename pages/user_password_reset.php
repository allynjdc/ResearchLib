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
                    <h3> Reset Password </h3>
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="uname">Username:</label>
                            <div class="col-sm-4">
                            <input type="text" class="form-control" name="uname" placeholder="Enter username">
                            </div>
                        </div>
                        <!-- <button class="btn-primary" type="submit" >Reset Password</button> -->
                        <button class="btn-primary" type="button" onclick="resetPassword()">Reset Password</button>
                    </form>
                    <p id="reset_status_msg"></p>
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

    function resetPassword() {
        alert("reset password clicked");
        document.getElementById('reset_status_msg').innerHTML = ""; // Reset status message
    
        var username = document.getElementsByName('uname')[0].value;
        var password = ""; // Server will provide the password
        var data = { 'uname': username, 'reset': '1', 'pwd': password };
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if ((this.readyState == 4) && (this.status == 200)) {
                if (this.responseText == "OK") {
                    window.location="homepage.php";
                } else {
                    document.getElementById('status_msg').innerHTML = "Unable to reset password. Make sure the username is correct.";
                }
            }
        };
        xmlhttp.open("POST", "../database/password_update.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xmlhttp.send(JSON.stringify(data));
    }
    </script>

</html>
