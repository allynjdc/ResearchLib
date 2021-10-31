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
		<div class="container-fluid ">    
		  	<div class="row content " >
		  		<br>

			    <div class="col-sm-3 sidenav" >
			    </div>

			    <div class="col-sm-6 center_content body_middle">
			    	<div class="center_content">

			    		<div class="text-justify">
			    			<br>
							<a href="user_add_research.php">
								<button type="button" class="btn btn-primary" >
									Upload Research
								</button>
							</a>
							<p>&nbsp;</p>
						</div>
					
						<div>
							<ul class="nav nav-tabs">
							    <li class="active"><a data-toggle="tab" href="#conducted">Conducted</a></li>
							    <li><a data-toggle="tab" href="#submitted">Submitted</a></li>
							    <li><a data-toggle="tab" href="#disseminated">Disseminated</a></li>
							    <li><a data-toggle="tab" href="#used">Used</a></li>
	  						</ul>
							<div class="tab-content">
							    <div id="conducted" class="tab-pane fade in active">
							      	<h3 class="title_brand_nav">Research Conducted</h3>
							      	<br>

							      	<!-- FETCHING RESEARCH DATA -- CONDUCTED -->
							    	<?php 
							    		$status = "Conducted";
										/*$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE research_status = '$status'";
										*/
										$query = "SELECT * FROM research_output AS ro 
												INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
												WHERE ro.research_status = '$status'";
										if ($result = $db->query($query)){
											// echo "result";
											while ($row = $result->fetch_assoc()){
												// Get the authors of the current research output
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
												$authorList = (empty($data_authors)) ? "Unknown Author" : join(",", $data_authors);
												$journalTitle = ucwords(strtolower($row['journal_title']));
												$datePublished = date('Y',strtotime($row['journal_date_publish']));
												echo $authorList." - ".$journalTitle.", ".$datePublished;
											?>
										</p>
										<p class="h6 text-justify">
											<?=substr($row['research_abstract'], 0, 270)."....."?>
										</p>
										<p class="text-right" style="">
											<a href="user_update_research.php?rid=<?=$row['research_id']?>" style="color: green;">
												update
											</a> 
											&nbsp;&nbsp;|&nbsp;&nbsp; 
											<a href="" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<?php
										}
									} else {
										echo "<p> No uploaded Conducted Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
										    <li><a href="#">Previous</a></li>
										    <li><a href="#">1</a></li>
										    <li><a href="#">2</a></li>
										    <li><a href="#">3</a></li>
										    <li><a href="#">4</a></li>
										    <li><a href="#">5</a></li>
										    <li><a href="#">Next</a></li>
				  						</ul>
									</div>

							    </div>
							    <div id="submitted" class="tab-pane fade">
							      	<h3 class="title_brand_nav">Research Submitted</h3>
							      	<br>
							      	
							      	<!-- FETCHING RESEARCH DATA -- SUBMITTED -->
							    	<?php 
							    		$status = "SUBMITTED";
										$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE research_status = '$status'";
										if ($result = $db->query($query)){
											// echo "result";
											while ($row = $result->fetch_assoc()){

									?>

							      	<div class="">
										<p class="h4 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </a></b></p>
										<p class="h5 text-justify" style="color: maroon">
											<?=$row['researcher_first_name'][0].".".$row['researcher_middle_name'][0].". ".$row['researcher_last_name']?> - <?=ucwords(strtolower($row['journal_title'])).", ".date('Y',strtotime($row['journal_date_publish']))?> 
										</p>
										<p class="h6 text-justify">
											<?=substr($row['research_abstract'], 0, 270)."....."?>
										</p>
										<p class="text-right" style="">
											<a href="user_update_research.php?rid=<?=$row['research_id']?>" style="color: green;">
												update
											</a> 
											&nbsp;&nbsp;|&nbsp;&nbsp; 
											<a href="" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<?php
										}
									} else {
										echo "<p> No uploaded Submitted Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
										    <li><a href="#">Previous</a></li>
										    <li><a href="#">1</a></li>
										    <li><a href="#">2</a></li>
										    <li><a href="#">3</a></li>
										    <li><a href="#">4</a></li>
										    <li><a href="#">5</a></li>
										    <li><a href="#">Next</a></li>
				  						</ul>
									</div>

							    </div>
							    <div id="disseminated" class="tab-pane fade">
							      	<h3 class="title_brand_nav">Research Disseminated</h3>
							      	<br>
							      	
							      	<!-- FETCHING RESEARCH DATA -- DISSEMINATED -->
							    	<?php 
							    		$status = "Disseminated";
										$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE research_status = '$status'";
										if ($result = $db->query($query)){
											// echo "result";
											while ($row = $result->fetch_assoc()){

									?>

							      	<div class="">
										<p class="h4 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </a></b></p>
										<p class="h5 text-justify" style="color: maroon">
											<?=$row['researcher_first_name'][0].".".$row['researcher_middle_name'][0].". ".$row['researcher_last_name']?> - <?=ucwords(strtolower($row['journal_title'])).", ".date('Y',strtotime($row['journal_date_publish']))?> 
										</p>
										<p class="h6 text-justify">
											<?=substr($row['research_abstract'], 0, 270)."....."?>
										</p>
										<p class="text-right" style="">
											<a href="user_update_research.php?rid=<?=$row['research_id']?>" style="color: green;">
												update
											</a> 
											&nbsp;&nbsp;|&nbsp;&nbsp; 
											<a href="" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<?php
										}
									} else {
										echo "<p> No uploaded Disseminated Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
										    <li><a href="#">Previous</a></li>
										    <li><a href="#">1</a></li>
										    <li><a href="#">2</a></li>
										    <li><a href="#">3</a></li>
										    <li><a href="#">4</a></li>
										    <li><a href="#">5</a></li>
										    <li><a href="#">Next</a></li>
				  						</ul>
									</div>

							    </div>
							    <div id="used" class="tab-pane fade">
							      	<h3 class="title_brand_nav">Research Used</h3>
							      	<br>
							      	
							      	<!-- FETCHING RESEARCH DATA -- USED -->
							    	<?php 
							    		$status = "Used";
										$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE research_status = '$status'";
										if ($result = $db->query($query)){
											// echo "result";
											while ($row = $result->fetch_assoc()){

									?>

							      	<div class="">
										<p class="h4 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </a></b></p>
										<p class="h5 text-justify" style="color: maroon">
											<?=$row['researcher_first_name'][0].".".$row['researcher_middle_name'][0].". ".$row['researcher_last_name']?> - <?=ucwords(strtolower($row['journal_title'])).", ".date('Y',strtotime($row['journal_date_publish']))?> 
										</p>
										<p class="h6 text-justify">
											<?=substr($row['research_abstract'], 0, 270)."....."?>
										</p>
										<p class="text-right" style="">
											<a href="user_update_research.php?rid=<?=$row['research_id']?>" style="color: green;">
												update
											</a> 
											&nbsp;&nbsp;|&nbsp;&nbsp; 
											<a href="" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<?php
										}
									} else {
										echo "<p> No uploaded Used Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
										    <li><a href="#">Previous</a></li>
										    <li><a href="#">1</a></li>
										    <li><a href="#">2</a></li>
										    <li><a href="#">3</a></li>
										    <li><a href="#">4</a></li>
										    <li><a href="#">5</a></li>
										    <li><a href="#">Next</a></li>
				  						</ul>
									</div>

							    </div>
							</div>
						</div>
					</div>
				</div>
						
				<div class="col-sm-3 sidenav" >
			    	<div class="col-sm-8 h6" style="background-color: white;">
			    	</div>
			    	<div class="col-sm-4" ></div>
			    </div>
		  	</div>
		</div>
		<!-- Footer -->
		<div class="footer text-center">
			<p>&nbsp;</p> 
		    <p class="">All rights reserved &copy; 2021</p>
		    <p>&nbsp;</p>
		</div>
	</body>
</html>