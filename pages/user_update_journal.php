<?php
include "../database/db_config.php";
session_start();

if (!$_SESSION['user']) {
	header("Location:index.php");   // Redirect to index page. User cannot view this page if he/she is not yet logged in.
}

if (isset($_POST['submit'])){
	$jid = $_POST['journ_id'];
	$user_id = $_POST['journ_user'];
	$title = $_POST['journ_title'];
	$desc = $db->real_escape_string($_POST['journ_desc']);
	$volume = $_POST['journ_vol'];
	$issue = $_POST['journ_issue'];
	$issn = $db->real_escape_string($_POST['journ_issn']);
	$pub = $_POST['journ_publisher'];
	$jdate = $_POST['journ_date'];
	$dev = $_POST['journ_dev_team'];
    $updated = date('y-m-d h:m:s');

	$old_photoname = $_POST['journ_old_photo'];
	$new_photoname = $_FILES['journ_photo']['name'];
	$photoname = empty($new_photoname) ? $old_photoname : $new_photoname;
	$location1 = "../images/journals/".$photoname;
	

	$old_filename = $_POST['journ_old_file'];
	$new_filename = $_FILES['journ_file']['name'];
	$filename = empty($new_filename) ? $old_filename : $new_filename;
	$location2 = "../resources/journals/".$filename;

	$query = "UPDATE research_journal 
			SET journal_title = '$title', journal_description = '$desc', journal_volume = '$volume', journal_issue = '$issue', journal_issn = '$issn', journal_publisher_name = '$pub', journal_date_publish = '$jdate', journal_filename = '$filename', journal_filepath = '$location2', journal_editor_team = '$dev', journal_updated_at = '$updated', journal_photo = '$photoname'
            WHERE journal_id = '$jid'";

if ($db->query($query) === TRUE) {
	$uploadSuccess = true;
	$errorMsg = "";
	if (!empty($new_filename) && !move_uploaded_file($_FILES['journ_file']['tmp_name'],$location2)) {
		$uploadSuccess = false;
		$errorMsg .= $_FILES['journ_file']['error'];
	} 
	if (!empty($new_photoname) && !move_uploaded_file($_FILES['journ_photo']['tmp_name'],$location1)) {
		$uploadSuccess = false;
		$errorMsg .= $_FILES['journ_photo']['error'];
	}
	
	if ($uploadSuccess){ 
		header("Location:user_journal_list.php"); 
	} else {
		echo "NOK".$errorMsg; 
	}
} else {
		echo "NOK 2";
		echo $db->error;
	}

		echo $db->error;
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
                    
			    	<!-- FETCHING JOURNAL DATA -->
			    	<?php 
						$jid = intval($_GET['id']);
						// echo $id;
						$query = "SELECT * FROM research_journal WHERE journal_id = '$jid'";
						if ($result = $db->query($query)){
							// echo "result";
							while ($row = $result->fetch_assoc()){

					?>

                    <div class="col-sm-6 col-sm-offset-3 body_middle" >
                    	<h3> Update Journal </h3>
                    	<form target="_SELF" method="POST" enctype="multipart/form-data">
                    		<input id="journ_id" type="hidden" value="<?=$row['journal_id'] ?>" name="journ_id">
                    		<input id="journ_user" type="hidden" value="<?=$row['journal_user_id'] ?>" name="journ_user">
						    <div class="input-group">
						      	<span class="input-group-addon">Journal Title</span>
						      	<input id="journ_title" type="text" class="form-control" name="journ_title" placeholder="title" value="<?=$row['journal_title']?>" required>
						    </div>
						    <br>
						    <!-- <div class="input-group">
						      	<span class="input-group-addon">Journal Description</span>
						      	<input id="journ_desc" type="text" class="form-control" name="journ_desc" placeholder="tell us about the Journal" >
						    </div> -->
						    <div class="input-group" >
						      	<span class="input-group-addon">Journal Description</span>
						      	<textarea id="journ_desc" name="journ_desc" rows="2"  class="md-textarea form-control" value="" required>
						      		<?=$row['journal_description']?>
						      	</textarea>
						      	<!-- cols="76" -->
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Volume</span>
						      	<input id="journ_vol" type="number" class="form-control" name="journ_vol" placeholder="1" min="1" max="5000" value="<?=$row['journal_volume']?>" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Issue</span>
						      	<input id="journ_issue" type="number" class="form-control" name="journ_issue" placeholder="1" min="1" max="5000" value="<?=$row['journal_issue']?>" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">ISSN</span>
						      	<input id="journ_issn" type="text" class="form-control" name="journ_issn" placeholder="1467-9817" value="<?=$row['journal_issn']?>" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Date Published</span>
						      	<input id="journ_date" type="date" class="form-control" name="journ_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31" value="<?=$row['journal_date_publish']?>" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Publisher</span>
						      	<input id="journ_publisher" type="text" class="form-control" name="journ_publisher" placeholder="Additional Info" value="<?=$row['journal_publisher_name']?>" required>
						    </div>
						    <br>
						    <div class="input-group">
						      	<span class="input-group-addon">Development Team Member</span>
						      	<input id="journ_dev_team" type="text" class="form-control" name="journ_dev_team" placeholder="Member Name" value="<?=$row['journal_editor_team']?>">
						    </div>
						    <br>
						    <p class="text-justify"> <b class="col-sm-4"> Insert the Front Page Photo: </b> 
						    	<input id="journ_old_photo" type="hidden" class="" name="journ_old_photo" accept="image/*, .pdf, .doc, .txt" value="<?=$row['journal_photo']?>">
						    	<input id="journ_photo" type="file" class="col-sm-6" name="journ_photo" accept="image/*, .pdf, .doc, .txt" value="<?=$row['journal_photo']?>">
					      	</p>
					      	<br>
					       	<p class="text-justify"> <b class="col-sm-4"> Journal Final Copy: </b> 
					       		<input id="journ_old_file" type="hidden" class="" name="journ_old_file" accept="image/*, .pdf, .doc, .txt" value="<?=$row['journal_filename']?>">
					       		<input id="journ_file" type="file" class=" col-sm-6" name="journ_file" accept="image/*, .pdf, .doc, .txt" value="<?=$row['journal_filename']?>">
					      	</p>
					      	<p class="col-sm-12">
					      		<br>
					      		<input type = "submit" name = "submit" value = "Update Journal">
					      	</p>
	  					</form>
                    </div>
	                    
			    </div>

			    <?php
					}
				} else {
					echo "<p> No uploaded memorandum yet.</p>";
				}
				?>


		  </div>
		</div>

		<br>
		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>

	</body>
</html>
