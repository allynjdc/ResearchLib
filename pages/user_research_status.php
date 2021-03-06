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
								<!-- Default is the "conducted" tab -->
							    <li class="<?= !isset($_GET["tab"]) || $_GET["tab"] == "conducted" ? "active" : "" ?>"><a data-toggle="tab" href="#conducted">Conducted</a></li>
							    <li class="<?= isset($_GET["tab"]) && $_GET["tab"] == "submitted" ? "active" : "" ?>"><a data-toggle="tab" href="#submitted">Submitted</a></li>
							    <li class="<?= isset($_GET["tab"]) && $_GET["tab"] == "disseminated" ? "active" : "" ?>"><a data-toggle="tab" href="#disseminated">Disseminated</a></li>
							    <li class="<?= isset($_GET["tab"]) && $_GET["tab"] == "used" ? "active" : "" ?>"><a data-toggle="tab" href="#used">Used</a></li>
	  						</ul>
							<div class="tab-content">
							    <div id="conducted" class="tab-pane fade <?php if (!isset($_GET["tab"]) || $_GET["tab"] == "conducted") echo "in active" ?>">
							      	<h3 class="title_brand_nav">Research Conducted</h3>
							      	<br>

							      	<!-- FETCHING RESEARCH DATA -- CONDUCTED -->
							    	<?php 
										$status = "Conducted";

										// Get current page number
										$pageno = (isset($_GET["conductedpageno"])) ? $_GET["conductedpageno"] : 1; // Default is page 1
										
										// Formula for pagination
										$no_of_records_per_page = 10;
										$offset = ($pageno - 1) * $no_of_records_per_page;

										// Get total number of pages
										$total_pages_query = "SELECT COUNT(*) FROM research_output AS ro 
										INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
										WHERE ro.research_status = '$status'";
										$result_count = $db->query($total_pages_query);
										$total_rows = mysqli_fetch_array($result_count)[0];
										$total_pages = ceil($total_rows / $no_of_records_per_page);


										$query = "SELECT * FROM research_output AS ro 
												INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
												WHERE ro.research_status = '$status' LIMIT $offset, $no_of_records_per_page";
										$counter = 0;
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
												$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
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
											<a href="#RemoveResearchModal" data-toggle="modal" data-target="#RemoveResearchModal<?=$row['research_id']?>" data-whatever="RemoveResearch" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<!-- Modal(s) for Remove Researches -->
									<div class="modal fade text-justify col-sm-12" id="RemoveResearchModal<?=$row['research_id']?>" tabindex="-1" role="dialog" aria-labelledby="RemoveResearchModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title h3 col-sm-10" id="RemoveResearchModalLabel">Delete Research</h5>
													<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<h4> Are you sure you want to delete the Research (<b><?= ucwords(strtolower($row['research_title'])) ?></b>)? <h4>
												</div>
												<div class="modal-footer">
													<p id="remove_research_status_msg_<?=$row['research_id']?>"></p>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-danger" onclick="removeResearch(<?=$row['research_id']?>)">Delete</button>
												</div>
											</div>
										</div>
									</div>

									<?php
											$counter = $counter + 1;
										}
										if($counter == 0){
											echo "<p> No uploaded Conducted Research yet.</p>";
										}
									} else {
										echo "<p> No uploaded Conducted Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
											<?php
											if ($total_pages > 1) { // No need to do a pagination if there's only one page
								
												$max_displayed_page = 5; // NOTE: This should be an odd number;
												$current_page = $pageno;
												$min_page = 1;
												$max_page = $total_pages;

												// Previous button
												if ($current_page <= 1) {
													echo "<li class='disabled'><a href='#'>Previous</a></li>";
												} else {
													echo "<li><a href='?tab=conducted&conductedpageno=".($current_page - 1)."'>Previous</a></li>";
												}

												// Numbered buttons
												// Setup which page numbers to display
												$lower_page = $min_page;
												$upper_page = $max_page;
												if ($total_pages > $max_displayed_page) {
								
													$lower_page = $current_page - floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number
													$upper_page = $current_page + floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number

													if ($lower_page < $min_page) {
														$lower_page = $min_page;
														$upper_page = $lower_page + ($max_displayed_page - 1);
													}

													if ($upper_page > $max_page) {
														$upper_page = $max_page;
														$lower_page = $upper_page - ($max_displayed_page - 1);
													}
												}
												// Display the numbered buttons
												for ($page_num = $lower_page; $page_num <= $upper_page; ++$page_num) {
													if ($current_page == $page_num) {
														echo "<li class='active'><a href='#'>".$page_num."</a></li>";
													} else {
														echo "<li><a href='?tab=conducted&conductedpageno=".$page_num."'>".$page_num."</a></li>";
													}
												}

												// Next button
												if ($current_page >= $total_pages) {
													echo "<li class='disabled'><a href='#'>Next</a></li>";
												} else {
													echo "<li><a href='?tab=conducted&conductedpageno=".($current_page + 1)."'>Next</a></li>";
												}
											}
											?>
										</ul>
									</div>
							    </div>

							    <div id="submitted" class="tab-pane fade <?php if (isset($_GET["tab"]) && $_GET["tab"] == "submitted") echo "in active" ?>">
							      	<h3 class="title_brand_nav">Research Submitted</h3>
							      	<br>
							      	
							      	<!-- FETCHING RESEARCH DATA -- SUBMITTED -->
							    	<?php 
							    		$status = "SUBMITTED";

										// Get current page number
										$pageno = (isset($_GET["submittedpageno"])) ? $_GET["submittedpageno"] : 1; // Default is page 1
										
										// Formula for pagination
										$no_of_records_per_page = 10;
										$offset = ($pageno - 1) * $no_of_records_per_page;

										// Get total number of pages
										$total_pages_query = "SELECT COUNT(*) FROM research_output AS ro 
																INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
																WHERE ro.research_status = '$status'";
										$result_count = $db->query($total_pages_query);
										$total_rows = mysqli_fetch_array($result_count)[0];
										$total_pages = ceil($total_rows / $no_of_records_per_page);

										$query = "SELECT * FROM research_output AS ro 
												INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
												WHERE ro.research_status = '$status' LIMIT $offset, $no_of_records_per_page";
										$counter = 0;
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
												$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
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
											<a href="#RemoveResearchModal" data-toggle="modal" data-target="#RemoveResearchModal<?=$row['research_id']?>" data-whatever="RemoveResearch" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<!-- Modal(s) for Remove Researches -->
									<div class="modal fade text-justify col-sm-12" id="RemoveResearchModal<?=$row['research_id']?>" tabindex="-1" role="dialog" aria-labelledby="RemoveResearchModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title h3 col-sm-10" id="RemoveResearchModalLabel">Delete Research</h5>
													<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<h4> Are you sure you want to delete the Research (<b><?= ucwords(strtolower($row['research_title'])) ?></b>)? <h4>
												</div>
												<div class="modal-footer">
													<p id="remove_research_status_msg_<?=$row['research_id']?>"></p>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-danger" onclick="removeResearch(<?=$row['research_id']?>)">Delete</button>
												</div>
											</div>
										</div>
									</div>

									<?php
										$counter = $counter + 1;
										}
										if($counter == 0){
											echo "<p> No uploaded Submitted Research yet.</p>";
										}
									} else {
										echo "<p> No uploaded Submitted Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
											<?php
											if ($total_pages > 1) { // No need to do a pagination if there's only one page
								
												$max_displayed_page = 5; // NOTE: This should be an odd number;
												$current_page = $pageno;
												$min_page = 1;
												$max_page = $total_pages;

												// Previous button
												if ($current_page <= 1) {
													echo "<li class='disabled'><a href='#'>Previous</a></li>";
												} else {
													echo "<li><a href='?tab=submitted&submittedpageno=".($current_page - 1)."'>Previous</a></li>";
												}

												// Numbered buttons
												// Setup which page numbers to display
												$lower_page = $min_page;
												$upper_page = $max_page;
												if ($total_pages > $max_displayed_page) {
								
													$lower_page = $current_page - floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number
													$upper_page = $current_page + floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number

													if ($lower_page < $min_page) {
														$lower_page = $min_page;
														$upper_page = $lower_page + ($max_displayed_page - 1);
													}

													if ($upper_page > $max_page) {
														$upper_page = $max_page;
														$lower_page = $upper_page - ($max_displayed_page - 1);
													}
												}
												// Display the numbered buttons
												for ($page_num = $lower_page; $page_num <= $upper_page; ++$page_num) {
													if ($current_page == $page_num) {
														echo "<li class='active'><a href='#'>".$page_num."</a></li>";
													} else {
														echo "<li><a href='?tab=submitted&submittedpageno=".$page_num."'>".$page_num."</a></li>";
													}
												}

												// Next button
												if ($current_page >= $total_pages) {
													echo "<li class='disabled'><a href='#'>Next</a></li>";
												} else {
													echo "<li><a href='?tab=submitted&submittedpageno=".($current_page + 1)."'>Next</a></li>";
												}
											}
											?>
										</ul>
									</div>

							    </div>
							    <div id="disseminated" class="tab-pane fade <?php if (isset($_GET["tab"]) && $_GET["tab"] == "disseminated") echo "in active" ?>">
							      	<h3 class="title_brand_nav">Research Disseminated</h3>
							      	<br>
							      	
							      	<!-- FETCHING RESEARCH DATA -- DISSEMINATED -->
							    	<?php 
							    		$status = "Disseminated";

										// Get current page number
										$pageno = (isset($_GET["disseminatedpageno"])) ? $_GET["disseminatedpageno"] : 1; // Default is page 1
										
										// Formula for pagination
										$no_of_records_per_page = 10;
										$offset = ($pageno - 1) * $no_of_records_per_page;

										// Get total number of pages
										$total_pages_query = "SELECT COUNT(*) FROM research_output AS ro 
															INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
															WHERE ro.research_status = '$status'";
										$result_count = $db->query($total_pages_query);
										$total_rows = mysqli_fetch_array($result_count)[0];
										$total_pages = ceil($total_rows / $no_of_records_per_page);

										$query = "SELECT * FROM research_output AS ro 
												INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
												WHERE ro.research_status = '$status' LIMIT $offset, $no_of_records_per_page";
										$counter = 0;
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
												$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
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
											<a href="#RemoveResearchModal" data-toggle="modal" data-target="#RemoveResearchModal<?=$row['research_id']?>" data-whatever="RemoveResearch" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<!-- Modal(s) for Remove Researches -->
									<div class="modal fade text-justify col-sm-12" id="RemoveResearchModal<?=$row['research_id']?>" tabindex="-1" role="dialog" aria-labelledby="RemoveResearchModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title h3 col-sm-10" id="RemoveResearchModalLabel">Delete Research</h5>
													<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<h4> Are you sure you want to delete the Research (<b><?= ucwords(strtolower($row['research_title'])) ?></b>)? <h4>
												</div>
												<div class="modal-footer">
													<p id="remove_research_status_msg_<?=$row['research_id']?>"></p>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-danger" onclick="removeResearch(<?=$row['research_id']?>)">Delete</button>
												</div>
											</div>
										</div>
									</div>

									<?php
										$counter = $counter + 1;
										}
										if($counter == 0){
											echo "<p> No uploaded Disseminated Research yet.</p>";
										}
									} else {
										echo "<p> No uploaded Disseminated Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
											<?php
											if ($total_pages > 1) { // No need to do a pagination if there's only one page
								
												$max_displayed_page = 5; // NOTE: This should be an odd number;
												$current_page = $pageno;
												$min_page = 1;
												$max_page = $total_pages;

												// Previous button
												if ($current_page <= 1) {
													echo "<li class='disabled'><a href='#'>Previous</a></li>";
												} else {
													echo "<li><a href='?tab=disseminated&disseminatedpageno=".($current_page - 1)."'>Previous</a></li>";
												}

												// Numbered buttons
												// Setup which page numbers to display
												$lower_page = $min_page;
												$upper_page = $max_page;
												if ($total_pages > $max_displayed_page) {
								
													$lower_page = $current_page - floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number
													$upper_page = $current_page + floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number

													if ($lower_page < $min_page) {
														$lower_page = $min_page;
														$upper_page = $lower_page + ($max_displayed_page - 1);
													}

													if ($upper_page > $max_page) {
														$upper_page = $max_page;
														$lower_page = $upper_page - ($max_displayed_page - 1);
													}
												}
												// Display the numbered buttons
												for ($page_num = $lower_page; $page_num <= $upper_page; ++$page_num) {
													if ($current_page == $page_num) {
														echo "<li class='active'><a href='#'>".$page_num."</a></li>";
													} else {
														echo "<li><a href='?tab=disseminated&disseminatedpageno=".$page_num."'>".$page_num."</a></li>";
													}
												}

												// Next button
												if ($current_page >= $total_pages) {
													echo "<li class='disabled'><a href='#'>Next</a></li>";
												} else {
													echo "<li><a href='?tab=disseminated&disseminatedpageno=".($current_page + 1)."'>Next</a></li>";
												}
											}
											?>
										</ul>
									</div>

							    </div>
							    <div id="used" class="tab-pane fade <?php if (isset($_GET["tab"]) && $_GET["tab"] == "used") echo "in active" ?>">
							      	<h3 class="title_brand_nav">Research Used</h3>
							      	<br>
							      	
							      	<!-- FETCHING RESEARCH DATA -- USED -->
							    	<?php 
							    		$status = "Used";

										// Get current page number
										$pageno = (isset($_GET["usedpageno"])) ? $_GET["usedpageno"] : 1; // Default is page 1
										
										// Formula for pagination
										$no_of_records_per_page = 10;
										$offset = ($pageno - 1) * $no_of_records_per_page;

										// Get total number of pages
										$total_pages_query = "SELECT COUNT(*) FROM research_output AS ro 
															INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
															WHERE ro.research_status = '$status'";
										$result_count = $db->query($total_pages_query);
										$total_rows = mysqli_fetch_array($result_count)[0];
										$total_pages = ceil($total_rows / $no_of_records_per_page);

										$query = "SELECT * FROM research_output AS ro 
												INNER JOIN research_journal AS rj ON ro.research_journal_id = rj.journal_id
												WHERE ro.research_status = '$status' LIMIT $offset, $no_of_records_per_page";
										$counter = 0;
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
												$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
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
											<a href="#RemoveResearchModal" data-toggle="modal" data-target="#RemoveResearchModal<?=$row['research_id']?>" data-whatever="RemoveResearch" style="color: red;">remove</a>
										</p>
										<p>&nbsp;</p>
									</div>

									<!-- Modal(s) for Remove Researches -->
									<div class="modal fade text-justify col-sm-12" id="RemoveResearchModal<?=$row['research_id']?>" tabindex="-1" role="dialog" aria-labelledby="RemoveResearchModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title h3 col-sm-10" id="RemoveResearchModalLabel">Delete Research</h5>
													<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<h4> Are you sure you want to delete the Research (<b><?= ucwords(strtolower($row['research_title'])) ?></b>)? <h4>
												</div>
												<div class="modal-footer">
													<p id="remove_research_status_msg_<?=$row['research_id']?>"></p>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
													<button type="button" class="btn btn-danger" onclick="removeResearch(<?=$row['research_id']?>)">Delete</button>
												</div>
											</div>
										</div>
									</div>

									<?php
											$counter = $counter + 1;
										}
										if($counter == 0){
											echo "<p> No uploaded Conducted Research yet.</p>";
										}
									} else {
										echo "<p> No uploaded Used Research yet.</p>";
									}
									?>

									<div class="text-right">
										<ul class="pagination pagination-sm ">
											<?php
											if ($total_pages > 1) { // No need to do a pagination if there's only one page
								
												$max_displayed_page = 5; // NOTE: This should be an odd number;
												$current_page = $pageno;
												$min_page = 1;
												$max_page = $total_pages;

												// Previous button
												if ($current_page <= 1) {
													echo "<li class='disabled'><a href='#'>Previous</a></li>";
												} else {
													echo "<li><a href='?tab=used&usedpageno=".($current_page - 1)."'>Previous</a></li>";
												}

												// Numbered buttons
												// Setup which page numbers to display
												$lower_page = $min_page;
												$upper_page = $max_page;
												if ($total_pages > $max_displayed_page) {
								
													$lower_page = $current_page - floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number
													$upper_page = $current_page + floor($max_displayed_page / 2); // Assuming $max_displayed_page is an odd number

													if ($lower_page < $min_page) {
														$lower_page = $min_page;
														$upper_page = $lower_page + ($max_displayed_page - 1);
													}

													if ($upper_page > $max_page) {
														$upper_page = $max_page;
														$lower_page = $upper_page - ($max_displayed_page - 1);
													}
												}
												// Display the numbered buttons
												for ($page_num = $lower_page; $page_num <= $upper_page; ++$page_num) {
													if ($current_page == $page_num) {
														echo "<li class='active'><a href='#'>".$page_num."</a></li>";
													} else {
														echo "<li><a href='?tab=used&usedpageno=".$page_num."'>".$page_num."</a></li>";
													}
												}

												// Next button
												if ($current_page >= $total_pages) {
													echo "<li class='disabled'><a href='#'>Next</a></li>";
												} else {
													echo "<li><a href='?tab=used&usedpageno=".($current_page + 1)."'>Next</a></li>";
												}
											}
											?>
										</ul>
									</div> <!-- End of pagination "USED RESEARCHES"-->

							    </div>
							</div>
						</div>
					</div>
				</div>
						
				<div class="col-sm-3 sidenav" >
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
		function removeResearch(research_id) {

			document.getElementById('remove_research_status_msg_' + research_id).innerHTML = "";
	
			var data = {'research_id': research_id };
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('RemoveResearchModal' + research_id).style.display = 'none';
						location.reload();
					} else {
						document.getElementById('remove_research_status_msg_' + research_id).innerHTML = "Unable to remove research." + this.responseText;
					}
				}
			};
			xmlhttp.open("POST", "../database/remove_research.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}
	</script>

</html>