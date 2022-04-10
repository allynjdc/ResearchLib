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
		<?php 
			@include("navigation.php");
		?>


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

			    	<!-- FETCHING JOURNAL DATA -->
			    	<?php 
						$jid = intval($_GET['id']);
						$filename = "";
						$defaultImg = "default_journal_photo.png";
						$query = "SELECT * FROM research_journal WHERE journal_id = '$jid'";
						if ($result = $db->query($query)){
							// echo "result";
							while ($row = $result->fetch_assoc()){
								$mDate = strtotime($row['journal_date_publish']);
								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								$jDate = strtoupper($months[intval(date('m',$mDate))])." ".date('Y',$mDate);
								$filename = $row['journal_filename'];

					?>

			    	<div class="center_content col-sm-12"  height="300px">  
			    		<div> 
			    			<p class="author_name h3" style="color: maroon;"> <b> <?=strtoupper($row['journal_title'])?> </b> </p>
			    		</div>
			    		<br>     	
						<div class="col-sm-2" >
							<img class="img-responsive" src="../images/journals/<?=empty($row['journal_photo']) ? $defaultImg : $row['journal_photo'];?>" alt="<?=$row['journal_title']?>" width="90px" height="130px" >
						</div>
						
						<div class="col-sm-10 text-left" >
							
							<p>Volume <?=$row['journal_volume']?>. No. <?=$row['journal_issue']?>, series <?=date('Y',$mDate)?> </p>
							<p><?=$jDate?></p>
							<p>ISSN: <?=$row['journal_issn']?></p>
							<!-- <p>DOI: 1467-9817</p> -->
							
						</div>
					</div>

					<div class="center_content col-sm-12">
						<br>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> About this Journal </b></p>
						</div>
						<div>
							<p class="col-sm-12 text-justify">
								<?=$row['journal_description']?>
							</p>
							<p class="col-sm-12 text-justify">
								<br>
								This Journal was published by the <?=$row['journal_publisher_name']?>.
							</p>
						</div>
					</div>

					<div class="center_content col-sm-12">
						<br>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> Development Team </b></p>
						</div>
						
						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left dev_team" style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left  " style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left  " style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6" style="height: 90px;">
							<br>
							<div class="col-md-12" style="">
								<div class="col-sm-3" >
									<img class="img-circle " src="../images/default_profile_picture.jpg" alt="Calcaben" width="50px" height="50px">
								</div>
								
								<div class="col-sm-9 text-left  " style="line-height: 50px; height: 50px; display: flex; align-items: center; " >
									<span class="" style="font-size: 10px; line-height: 1.2; display: inline-block; vertical-align: middle;"> <b class="author_name" style="color: maroon;"> Allyn Joy D. Calcaben </b> <br> Tagum National Trade School
									</span>
								</div>
							</div>
						</div>

					</div>

					<div class="center_content col-sm-12">
						<br>
						<div>
							<p class="author_name h4" style="color: maroon;"> <b> Articles </b></p> 
						</div>

						<?php

						$query = "SELECT * FROM research_output AS ro 
							INNER JOIN research_creation AS rc 
							INNER JOIN research_journal AS rj 
							INNER JOIN researcher as r 
							ON rj.journal_id = ro.research_journal_id AND 
								ro.research_id = rc.creation_research_id AND 
								rc.creation_researcher_id = r.researcher_id 
							WHERE rj.journal_id = '$jid'
							GROUP BY ro.research_title";

						// $query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE rj.journal_id = '$jid'";

						$counter = 0;
						if ($result = $db->query($query)) {
							while ($row = $result->fetch_assoc()) {

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


								$rdate = strtotime($row['journal_date_publish']);
								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

						?>
						
						<!-- <div class="col-sm-12">
							<p class="h5 text-justify"><b><a href="research_view.php?rid=<?=$row['research_id']?>"> <?=strtoupper($row['research_title'])?> </b></a></p>
							<p class="h6 text-justify" style="color: maroon"><?=ucwords(strtolower($row['researcher_first_name']))." ".strtoupper($row['researcher_middle_name'][0]).". ".ucwords(strtolower($row['researcher_last_name'])).", ".ucwords(strtolower($row['researcher_office']))?></p>
							<p class="h6 text-justify"> Date Published: <?=strtoupper($months[intval(date('m',$rdate))])." ".date('Y',$rdate)?></p>
							<p></p>
							<br>
						</div> -->

						<div class="col-sm-12">
							<p class="h5 text-justify">
								<b>
									<a href="research_view.php?rid=<?=$row['research_id']?>">
									<?php
										$capitalize_title = strtoupper($row['research_title']);
										$research_title_to_display = !empty($key) ? highlightWords($capitalize_title, $key) : $capitalize_title;
										echo $research_title_to_display;
									?>
									</a>
								</b>
							</p>
							<p class="h6 text-justify" style="color: maroon">
								<?php
									$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
									$journalTitle = ucwords(strtolower($row['journal_title']));
									$datePublished = date('Y',strtotime($row['journal_date_publish']));
									$sub_text = $authorList." - ".$journalTitle.", ".$datePublished;
									$text_to_display = !empty($key) ? highlightWords($sub_text, $key) : $sub_text;
									echo $text_to_display;
								?> 
							</p>
							<p></p>
						</div>

						<?php
								$counter = $counter + 1;
							}
							if($counter==0){
								echo "<p> No conducted Research yet.</p>";
							}
						} else {
							echo "<p> No conducted Research yet.</p>";
						}
						?>
						

					</div>

					<?php 
							if(isset($_SESSION['user'])){
					?>

					<div class="align-items-center">
						<br>
						<iframe src="../resources/journals/<?=$filename?>" width="100%" height="700px">
    					</iframe>
    					<br> <br>
					</div>

					<?php
							}
					
						}
					} else {
						echo "<p> No uploaded journal yet.</p>";
					}
						
					?>

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
		<br>
		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>

	</body>
</html>
