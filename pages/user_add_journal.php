<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

if (isset($_POST['submit'])){

	$user_id = $_POST['journ_user'];
	$title = $_POST['journ_title'];
	$desc = $db->real_escape_string($_POST['journ_desc']);
	$volume = $_POST['journ_vol'];
	$issue = $_POST['journ_issue'];
	$issn = $db->real_escape_string($_POST['journ_issn']);
	$pub = $_POST['journ_publisher'];
	$jdate = $_POST['journ_date'];
	$dev = "Unknown Development Team"; //$_POST['journ_dev_team'];
	$photoname = $_FILES['journ_photo']['name'];
	$location1 = "../images/journals/".$photoname;
	$filename = $_FILES['journ_file']['name'];
	$location2 = "../resources/journals/".$filename;
	$posted = date('y-m-d h:m:s');
    $updated = date('y-m-d h:m:s');

	$query = "INSERT INTO research_journal (journal_id, journal_user_id, journal_title, journal_description, journal_volume, journal_issue, journal_issn, journal_publisher_name, journal_date_publish, journal_editor_team, journal_filename, journal_filepath, journal_posted_at, journal_updated_at, journal_photo)
            VALUES (NULL, '$user_id', '$title', '$desc', '$volume', '$issue', '$issn', '$pub', '$jdate', '$dev', '$filename', '$location2', '$posted', '$updated', '$photoname')";

    if ($db->query($query) === TRUE) {
		// Save the upload file to the local filesystem
		if (move_uploaded_file($_FILES['journ_photo']['tmp_name'], $location1) && move_uploaded_file($_FILES['journ_file']['tmp_name'], $location2)) {
			header("Location:user_journal_list.php");    
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

		<!-- TODO: Move this style to the .css file -->
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
		<?php 
			@include("navigation.php");
		?>


		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid text-center">    
		  	<div class="row content">

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
                    
                    <div class="col-sm-6 col-sm-offset-3 body_middle">
                    	<h3> Add Journal </h3>
                    	<form target="_SELF" method="POST" enctype="multipart/form-data">
                    		<input id="journ_user" type="hidden" value="<?= $_SESSION['userid'] ?>" name="journ_user">
						    <div class="input-group">
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="journ_title" type="text" class="form-control" name="journ_title" placeholder="Title" required>
						    </div>
						    <br>
						    <!-- <div class="input-group">
						      	<span class="input-group-addon">Journal Description</span>
						      	<input id="journ_desc" type="text" class="form-control" name="journ_desc" placeholder="Tell us about the Journal" required>
						    </div> -->
						    <div class="input-group" >
						      	<span class="input-group-addon">Journal Description</span>
						      	<textarea id="journ_desc" name="journ_desc" rows="2"  class="md-textarea form-control"></textarea>
						      	<!-- cols="76" -->
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Volume</span>
						      	<input id="journ_vol" type="number" class="form-control" name="journ_vol" placeholder="1" min="1" max="5000" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Issue</span>
						      	<input id="journ_issue" type="number" class="form-control" name="journ_issue" placeholder="1" min="1" max="5000" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">ISSN</span>
						      	<input id="journ_issn" type="text" class="form-control" name="journ_issn" placeholder="1467-9817" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Date Published</span>
						      	<input id="journ_date" type="date" class="form-control" name="journ_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Publisher</span>
						      	<input id="journ_publisher" type="text" class="form-control" name="journ_publisher" placeholder="Publisher Name" required>
						    </div>
						    <br>
							<!--
						    <div class="input-group">
						      	<span class="input-group-addon">Development Team Member</span>
						      	<input id="journ_dev_team" type="text" class="form-control" name="journ_dev_team" placeholder="Member Name" required>
						    </div>
							-->
							<fieldset class="scheduler-border">
								<legend class="scheduler-border"><b>Development Team</b></legend>
		
								<div class="input-group">
									<span class="input-group-addon">Editor-in-Chief</span>
						      		<input id="dev_team_editor_in_chief" type="text" class="form-control" name="dev_team_editor_in_chief" placeholder="Editor-in-Chief Name" required>
								</div>
								<br/>
								<div class="input-group">
									<span class="input-group-addon">Executive Editor</span>
						      		<input id="dev_team_exec_editor" type="text" class="form-control" name="dev_team_exec_editor" placeholder="Executive Editor Name" required>
								</div>
								<br/>
								<div class="input-group">
									<span class="input-group-addon">Publications Manager</span>
						      		<input id="dev_team_pub_manager" type="text" class="form-control" name="dev_team_pub_manager" placeholder="Publication Manager Name" required>
								</div>
								<br/>
								<div class="input-group">
									<div class="control-label col-sm-3">Technical Editors:</div>
									<div class="col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_tech_editor[]" placeholder="Technical Editor Name" required>
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_tech_editor[]" placeholder="Technical Editor Name">
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_tech_editor[]" placeholder="Technical Editor Name">
									</div>
								</div>
								<br/>
								<div class="input-group">
									<div class="control-label col-sm-3">Copy Editors:</div>
									<div class="col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_copy_editor[]" placeholder="Copy Editor Name" required>
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_copy_editor[]" placeholder="Copy Editor Name">
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_copy_editor[]" placeholder="Copy Editor Name">
									</div>
								</div>
								<br/>
								<div class="input-group">
									<div class="control-label col-sm-3">Layout Artists:</div>
									<div class="col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_layout_artist[]" placeholder="Layout Artist Name" required>
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_layout_artist[]" placeholder="Layout Artist Name">
									</div>
								</div>
								<br/>
								<div class="input-group">
									<div class="control-label col-sm-3">Editorial Consultants:</div>
									<div class="col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_consultants[]" placeholder="Editorial Consultant Name" required>
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_consultants[]" placeholder="Editorial Consultant Name">
									</div>
									<div class="col-sm-offset-3 col-sm-9">
						      			<input type="text" class="form-control" name="dev_team_consultants[]" placeholder="Editorial Consultant Name">
									</div>
								</div>
								<br/>
								<div class="input-group">
									<span class="input-group-addon">Research Production</span>
						      		<input id="dev_team_research_production" type="text" class="form-control" name="dev_team_research_production" placeholder="Research Production Name" required>
								</div>
							</fieldset>
							<br/>
						    <br/>
					       	<p class="text-justify"> <b class="col-sm-4"> Insert the Front Page Photo: </b> <input id="journ_photo" type="file" class="col-sm-6" name="journ_photo" accept="image/*, .pdf, .doc, .txt" >
					      	</p>
					      	<br>
					       	<p class="text-justify"> <b class="col-sm-4"> Journal Final Copy: </b> <input id="journ_file" type="file" class=" col-sm-6" name="journ_file" accept="image/*, .pdf, .doc, .txt" required>
					      	</p>
					      	<p class="col-sm-12">
					      		<br>
					      		<input type = "submit" name = "submit" value = "Add Journal">
					      	</p>
	  					</form>
                    </div>
	                    
			    </div>
		  </div>
		</div>

		<br>
		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>

	</body>

</html>
