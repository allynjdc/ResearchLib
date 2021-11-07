<?php
include "../database/db_config.php";
session_start();
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
			    <div class="navbar-header col-md-6">
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
			    <!-- <ul class="nav navbar-nav">
			      	<li class=""><a href="#">Home</a></li>
			      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
			        	<ul class="dropdown-menu">
			          		<li><a href="#">Page 1-1</a></li>
			          		<li><a href="#">Page 1-2</a></li>
			          		<li><a href="#">Page 1-3</a></li>
			        	</ul>
			      	</li>
			      	<li><a href="#">Page 2</a></li>
			    </ul> -->
			    <div>
			    <ul class="nav title_brand navbar-nav navbar-right">
			    	<li class="title_brand" >
			    		<a class="title_brand" href="memorandum.php">Memorandums</a>
			    	</li>
			    	<li class="title_brand" >
			    		<a class="title_brand" href="journals.php">Journals</a>
			    	</li>
			      	<?php
						if (!isset($_SESSION['user'])) { 
					?>
					<li class="title_brand" ><a class="title_brand" href="login.php">Login</a></li>
					<?php
						} else {
					?>
					<li class="dropdown title_brand">
                        <a href="#" class="dropbtn title_brand"><?= $_SESSION['user'] ?></a>
                        <div class="dropdown-content">
                            <a href="user_profile_view.php">View Profile</a>
                            <a href="user_profile_update.php">Edit Profile</a>
                            <a href="logout.php">Log out</a>
                        </div>
                    </li>
					<?php
						}
					?>
			    </ul>
				</div>
		  	</div>
		</nav>

		<!-- MAIN TEMPLATE FOR THE CONTENT -->
		<div class="container-fluid ">    
		  	<div class="row content">

			    <div class="col-sm-3 sidenav" >
			    	<!-- <div class="" style="background-color: white;">
			      	<p><a href="#">Link</a></p>
			      	<p><a href="#">Link</a></p>	
			      	<p><a href="#">Link</a></p>
			      	</div> -->
			    </div>

			    <div class="col-sm-6 center_content body_middle" >
			    <div class=" center_content" >

			    	<!-- FETCHING RESEARCH DATA -->
			    	<?php 
			    		$id = intval($_GET['rid']);
						//$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE ro.research_id = '$id'";

						$query = "SELECT * 
								FROM research_output AS ro
								INNER JOIN research_journal AS rj
								ON rj.journal_id = ro.research_journal_id
								WHERE ro.research_id = '$id'";

						if ($result = $db->query($query)) {
							while ($row = $result->fetch_assoc()) {  // Technically, this will only loop once
								$jtitle = ucwords(strtolower($row['journal_title']));
								$jpages = $row['research_journal_pages'];
								$rdate = strtotime($row['journal_date_publish']);
								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

								// Get the list of authors of this research
								$queryAuthors = "SELECT * FROM researcher AS rs INNER JOIN research_creation As rc ON rs.researcher_id = rc.creation_researcher_id WHERE rc.creation_research_id = $id";
								$data_authors = [];
								if ($resultAuthor = $db->query($queryAuthors)) {
									while ($rowAuthor = $resultAuthor->fetch_assoc()) {
										$fields = [];
										$fields['fullname'] = strtoupper($rowAuthor['researcher_first_name']." ".$rowAuthor['researcher_middle_name'][0].". ".$rowAuthor['researcher_last_name']);
										$fields['fname'] = ucwords(strtolower($rowAuthor['researcher_first_name']));
										$fields['lname'] = ucwords(strtolower($rowAuthor['researcher_last_name']));
										$fields['profilepic'] = $rowAuthor['researcher_profile_picture'];
										$fields['office'] = ucwords(strtolower($rowAuthor['researcher_office']));

										$data_authors[] = $fields; // fields added to $data_author array
									}
								} else {
									echo $db->error;
								}
								//var_dump($data_authors);
					?>

					<div>
						<p class="author_name h3" style="color: maroon;"> 
							<b> <?=strtoupper($row['research_title'])?> </b>
						</p>
					</div>

					<div>
						<br>
						<p> <?=strtoupper($months[intval(date('m',$rdate))])." ".date('Y',$rdate)?> </p>
						<p>DOI: <?=$row['research_doi']?></p>
						<p> In book: <?=$jtitle?> (pp. <?=$jpages?>) </p>

						<div> 
							<p><span class="glyphicon glyphicon-folder-open"> </span>&nbsp;&nbsp;<?=$row['research_category']?></p> 
							<p><span class="glyphicon glyphicon-book">  </span> &nbsp;&nbsp;<?=$row['research_type']?> </p>
							<p><span class="glyphicon glyphicon-briefcase">  </span>&nbsp;&nbsp;<?=$row['research_agenda']?></p>
						</div>
						
						<div>
							<br>
							<p class="h4" style="color: maroon;"><b><?= count($data_authors) > 1 ? 'Authors:' : 'Author:' ?></b></p>
							<?php
							foreach($data_authors as $author) {
							?>
								<div class="" style=" height: 50px;">
									<div class="col-sm-1" >
										<img class="  img-circle " src="../images/profile_pictures/<?=$author['profilepic']?>" alt="<?=$author['lname']?>" width="50px" height="50px">
									</div>
									
									<div class="col-sm-11 text-left" >
										<p> 
											<b class="author_name" style="color: maroon;"> <?=$author['fullname']?> 
											</b> 
											<br> <?=$author['office']?>
										</p>
									</div>
								</div>
							<?php
							} // End of foreach loop (for authors)
							?>
						</div>

					</div>
					<div>
						<br> 
						<p class="h4" style="color: maroon;"><b> Abstract </b></p>
						<p class="text-justify">
							<?=$row['research_abstract']?>
						</p>
					</div>
	
					<?php 
					if(isset($_SESSION['user'])) {
					?>
						<div class="align-items-center">
							<br>
							<iframe src="../resources/research/<?=$row['research_filename']?>" width="100%" height="700px">
							</iframe>
							<br> <br>
						</div>
					<?php
					} // End of if statement (isset)
					?>

					<div>
						<p class="h4" style="color: maroon;"> <br> <b> Cite this:</b></p>
						<div>
							<?php
									// $mla = "";
									// if(!empty($row['researcher_last_name'])){
									// 	$mla = $mla.$row['researcher_last_name'].", ".$row['researcher_first_name'].". ";
									// } else {
									// 	$mla = $mla."";
									// }
								
								$mla_authors = "Unknown";
								$apa_authors = "Unknown";
								$chicago_authors = "Unknown";
								
								if (count($data_authors) == 1) {

									$mla_authors = $data_authors[0]['lname'].", ".$data_authors[0]['fname'];
									$apa_authors = $data_authors[0]['lname'].", ".$data_authors[0]['fname'][0];
									$chicago_authors = $data_authors[0]['lname']." ".$data_authors[0]['fname'];
					
								} else if (count($data_authors) == 2) {

									$mla_authors = $data_authors[0]['lname'].", ".$data_authors[0]['fname']." and ".$data_authors[1]['lname'].", ".$data_authors[1]['fname'];
									$apa_authors = $data_authors[0]['lname'].", ".$data_authors[0]['fname'][0]." and ". $data_authors[1]['lname'].", ".$data_authors[1]['fname'][0];
									$chicago_authors = $data_authors[0]['lname']." ".$data_authors[0]['fname']." and ". $data_authors[1]['lname']." ".$data_authors[1]['fname'];
					
								} else if (count($data_authors) >= 3) {

									$mla_authors = $data_authors[0]['lname'].", ".$data_authors[0]['fname']." et al";
									$apa_authors = $data_authors[0]['lname'].", ".$data_authors[0]['fname'][0]." et al";
									$chicago_authors = $data_authors[0]['lname']." ".$data_authors[0]['fname']." et al";
								}

								$mla = $mla_authors.'. "'.$row['research_title'].'." <i>'.$row['journal_title']."</i>, vol. ".$row['journal_volume'].", no. ".$row['journal_issue'].", ".$months[intval(date('m',$rdate))]." ".date('Y',$rdate).", pp. ".$row['research_journal_pages'].", doi: ".$row['research_doi'].".";

								$apa = $apa_authors.'. ('.date('Y',$rdate)."). ".$row['research_title'].'. <i>'.$row['journal_title'].", ".$row['journal_volume']."</i>(".$row['journal_issue']."), ".$row['research_journal_pages'].". ".$row['research_doi'].".";

								$chicago = $chicago_authors.', "'.$row['research_title'].'," <i>'.$row['journal_title']."</i> ".$row['journal_volume'].", no. ".$row['journal_issue']." (".date('Y',$rdate)."): ".$row['research_journal_pages'].", ".$row['research_doi'].".";

							?>
							<p class="col-md-2" style="color: maroon;"><b>MLA</b></p>
							<p class="col-md-10">
								<?=$mla?>
								<!-- Guan, Yuanhui, Weihua Shi, and Desheng Wu. "The Design and Development of a School File Management System for Standardized." 2012 International Conference on Computer Science and Electronics Engineering. Vol. 2. IEEE, 2012. -->
							</p>
						</div>
						<div>
							<p class="col-md-2" style="color: maroon;"><b>APA</b></p>
							<p class="col-md-10">
								<?=$apa?>
								<!-- Guan, Y., Shi, W., & Wu, D. (2012, March). The Design and Development of a School File Management System for Standardized. In 2012 International Conference on Computer Science and Electronics Engineering (Vol. 2, pp. 630-634). IEEE. -->
							</p>
						</div>
							<p class="col-md-2" style="color: maroon;"><b>CHICAGO</b></p>
							<p class="col-md-10">
								<?=$chicago?>
								<!-- Guan, Yuanhui, Weihua Shi, and Desheng Wu. "The Design and Development of a School File Management System for Standardized." In 2012 International Conference on Computer Science and Electronics Engineering, vol. 2, pp. 630-634. IEEE, 2012. -->
							</p>
						</div>
						<p>&nbsp;</p>

						<?php
							} // End of while loop
						} else {
							echo "<p> No conducted Research yet.</p>";
						}
						?>

					</div>
					</div>
						
				<div class="col-sm-3 sidenav" >
			    	<!-- <div style="background-color: white;">
			    
				    	<div class="well">
				        	<p>ADS</p>
				      	</div>
				      	<div class="well">
				        	<p>ADS</p>
				      	</div>
				    </div> -->
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
