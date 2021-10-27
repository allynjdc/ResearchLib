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
		
	</head>
	<body class="bg-light">

		<!-- Navigation -->
		<nav class="navbar navbar-inverse" > <!-- navbar-default style="background-color: #D5EBF6"-->
		  	<div class="container-fluid col-md-10 col-md-offset-1">
			    <div class="navbar-header">
			      	<a class="navbar-brand nav_title_a" href="index.php">
			      		<span><img src="../images/logo1.png" height="30px" width="50px"></span>
			      		<!-- <p class="title_brand_nav text-center"> -->
			      			<span class="title_brand_nav"> Division Digital Research Library </span>
			      		<!-- </p> -->
			      	</a>
			    </div>
			    
			    <ul class="nav navbar-nav navbar-right">
			    	<li class="title_brand"><a class="title_brand" href="memorandum.php">Memorandums</a></li>
			    	<li class="title_brand"><a class="title_brand" href="journals.php">Journals</a></li>
					<?php
						if (!isset($_SESSION['user'])) {
							echo "<li class=\"title_brand\"><a class=\"title_brand\" href=\"login.php\">Login in</a></li>";
						} else {
							echo "<li class=\" title_brand dropdown\">
									<a href=\"#\" class=\"title_brand dropbtn\">" . $_SESSION['user'] . "</a>
									<div class=\"dropdown-content\">
										<a href=\"user_profile_view.php\">View Profile</a>
										<a href=\"user_profile_update.php\">Edit Profile</a>
										<a href=\"logout.php\">Log out</a>
									</div>
								</li>";
						}
					?>
			    </ul>
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
						$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE ro.research_id = '$id'";

						// echo "hello ".$id;

						if ($result = $db->query($query)){
							// echo "result";
							while ($row = $result->fetch_assoc()){

								$jtitle = ucwords(strtolower($row['journal_title']));
								$jpages = $row['research_journal_pages'];
								$rdate = strtotime($row['journal_date_publish']);
								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

								// echo "hey ";

					?>
			    		      	
					<div>
						<p class="author_name h3" style="color: maroon;"> 
							<b> <?=strtoupper($row['research_title'])?> </b>
						</p>
					</div>

					<div>
						<br>
						<p> <?=strtoupper($months[date('m',$rdate)])." ".date('Y',$rdate)?> </p>
						<p>DOI: <?=$row['research_doi']?></p>
						<p> In book: <?=$jtitle?> (pp. <?=$jpages?>) </p>

						<div> 
							<p><span class="glyphicon glyphicon-folder-open">  </span>&nbsp;&nbsp;<?=$row['research_category']?></p> 
							<p><span class="glyphicon glyphicon-book">  </span> &nbsp;&nbsp;<?=$row['research_type']?> </p>
							<p><span class="glyphicon glyphicon-briefcase">  </span>&nbsp;&nbsp;<?=$row['research_agenda']?></p>
						</div>
						
						<div>
							<br>
							<p class="h4" style="color: maroon;"><b>   Author: </b></p>
							<div class="" style=" height: 50px">
								<div class="col-sm-1" >
									<img class="  img-circle " src="../images/profile_pictures/<?=$row['researcher_profile_picture']?>" alt="<?=$row['researcher_last_name']?>" width="50px" height="50px">
								</div>
								
								<div class="col-sm-11 text-left" >
									<p> 
										<b class="author_name" style="color: maroon;"> <?=$row['researcher_first_name']." ".$row['researcher_middle_name'][0].". ".$row['researcher_last_name']?> 
										</b> 
										<br> <?=$row['researcher_office']?>
									</p>
								</div>
							</div>
						</div>

					</div>
					<div>
						<br> 
						<p class="h4" style="color: maroon;"><b> Abstract </b></p>
						<p class="text-justify">
							<?=$row['research_abstract']?>
						</p>
					</div>
					<div class="align-items-center">
						<br>
						<iframe src="../resources/research/<?=$row['research_filename']?>" width="100%" height="700px">
    					</iframe>
    					<br> <br>
					</div>
					<div>
						<p class="h4" style="color: maroon;"> <b> Cite this:</b></p>
						<div>
							<?php
									// $mla = "";
									// if(!empty($row['researcher_last_name'])){
									// 	$mla = $mla.$row['researcher_last_name'].", ".$row['researcher_first_name'].". ";
									// } else {
									// 	$mla = $mla."";
									// }

								$mla = $row['researcher_last_name'].", ".$row['researcher_first_name'].'. "'.$row['research_title'].'." <i>'.$row['journal_title']."</i>, vol. ".$row['journal_volume'].", no. ".$row['journal_issue'].", ".$months[date('m',$rdate)]." ".date('Y',$rdate).", pp. ".$row['research_journal_pages'].", doi: ".$row['research_doi'].".";

								$apa = $row['researcher_last_name'].", ".$row['researcher_first_name'][0].'. ('.date('Y',$rdate)."). ".$row['research_title'].'. <i>'.$row['journal_title'].", ".$row['journal_volume']."</i>(".$row['journal_issue']."), ".$row['research_journal_pages'].". ".$row['research_doi'].".";

								$chicago = $row['researcher_first_name']." ".$row['researcher_last_name'].', "'.$row['research_title'].'," <i>'.$row['journal_title']."</i> ".$row['journal_volume'].", no. ".$row['journal_issue']." (".date('Y',$rdate)."): ".$row['research_journal_pages'].", ".$row['research_doi'].".";;

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

						<?php
							}
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
		<!-- <footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer> -->

	</body>
</html>
