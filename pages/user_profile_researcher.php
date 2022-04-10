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
		<div class="container-fluid text-center ">    
		  	<div class="row content">
			    <div class="col-sm-3 sidenav">
			      	<!-- <p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p> -->
			    </div>
			    <div class="col-sm-6 center-div center-content body_middle"> 

			    	<!-- FETCHING RESEARCHER DATA -->
			    	<?php 
						$id = intval($_GET['id']);
						// echo $id;
						$query = "SELECT * FROM researcher WHERE researcher_id = '$id'";
						if ($result = $db->query($query)){
							// echo "result";

	                        $defaultImg = "default_profile_picture.jpg";
							while ($row = $result->fetch_assoc()){
								// echo "row";
								$userFullname = $row['researcher_first_name']." ".$row['researcher_middle_name'][0].". ".$row['researcher_last_name'];
								$userImage = empty($row['researcher_profile_picture']) ? $defaultImg : $row['researcher_profile_picture'];								
					?>

			    	<br> <br>
			      	<img class="img-circle center-block" src="../images/profile_pictures/<?=$userImage?>" alt="<?=$userFullname?>" width="200px" height="200px"> 
			      	<br>
			      	<div>
			      		<p class="title_brand_nav h3">
			      			<b><?=ucwords(strtolower($userFullname))?></b>
			      		</p>
			      		<p class="title_brand_nav h5">
			      			<?=ucwords(strtolower($row['researcher_email']))?>
			      			<br>
			      		</p>
			      		<p class="h5">
			      			<!-- <?=ucwords(strtolower($row['researcher_email']))?> <br> -->
			      			<?=ucwords(strtoupper($row['researcher_designation']))?> <br>
			      			<?=ucwords(strtolower($row['researcher_office']))?> <br>
			      		</p>
			      		<br>	
			      	</div>

			      	<?php 

			      		}

					} else {
						echo "<p> No users yet.</p>";
					}

					?>

			      	<br>

			      	<div class="text-justify">
			      		<p class="title_brand_nav h4">
			  				<b> Researches: </b> <br><br>
			      		</p>
			      		<div class="" style="left:10px">

				      		<!-- FETCHING RESEARCH DATA -->
					    	<?php 
								$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE r.researcher_id = '$id'";
								$counter = 0;
								if ($result = $db->query($query)){
									// echo "result";
									while ($row = $result->fetch_assoc()){
										$currResearchId = $row['research_id'];
										$queryAuthors = "SELECT researcher_first_name AS fname, researcher_middle_name AS mname, researcher_last_name AS lname
													FROM researcher AS rs 
													INNER JOIN research_creation As rc ON rs.researcher_id = rc.creation_researcher_id
													WHERE rc.creation_research_id = $currResearchId";
										$data_authors = [];
										if ($resultAuthor = $db->query($queryAuthors)) {
											while ($rowAuthor = $resultAuthor->fetch_assoc()) {
												$data_authors[] = strtoupper($rowAuthor['fname'][0]).".".strtoupper($rowAuthor['mname'][0]).". ".ucwords(strtolower($rowAuthor['lname']));
											}
										} else {
											echo $db->error;
										} 
							?>
				      		<div class="">
								<p class="h4 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </a></b></p>
								<p class="h5 text-justify" style="color: maroon">
									<?php
										$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
										$journalTitle = ucwords(strtolower($row['journal_title']));
										$datePublished = date('Y',strtotime($row['journal_date_publish']));
										echo $authorList." - ".$journalTitle.", ".$datePublished;
									?> 
								</p>
								<p class="h6 text-justify">
									<?=substr($row['research_abstract'], 0, 270)."....."?>
								</p>
								<p>&nbsp;</p>
								<br>
							</div>

							<?php
									$counter = $counter + 1;
								}
								if($counter == 0){
									echo "<p> No conducted Research yet.</p>";
								}
							} else {
								echo "<p> No conducted Research yet.</p>";
							}
							?>
				      	</div>
			      	</div>
			    </div>

			    <div class="col-sm-3 sidenav">
			    	<!-- <div class="well">
			        	<p>ADS</p>
			      	</div>
			      	<div class="well">
			        	<p>ADS</p>
			      	</div> -->
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
