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
		<div class="container-fluid">    
		  	<div class="row content">

			    <div class="col-sm-3 sidenav" >
			    	<!-- <div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6">
			    					      	
			      	</div> -->
			    </div>

			    <div class="col-sm-6 center_content body_middle">
			    	<br>
			    	<!-- <div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
		    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
					
						<p class="h5 text-justify">
							Virtual Training on Advancing Research Through 6D Scheme for Second Batch
						</p>
						<p class="h5 text-justify">
							DM 284, s. 2021
						</p>
					</div> 
					<br> -->

					<!-- FETCHING MEMORANDUM -->
					<?php 
						// Get current page number
						$pageno = (isset($_GET["pageno"])) ? $_GET["pageno"] : 1; // Default is page 1
						
						// Formula for pagination
						$no_of_records_per_page = 10;
						$offset = ($pageno - 1) * $no_of_records_per_page;

						// Get total number of pages
						$total_pages_query = "SELECT COUNT(*) FROM memorandum";
						$result_count = $db->query($total_pages_query);
						$total_rows = mysqli_fetch_array($result_count)[0];
						$total_pages = ceil($total_rows / $no_of_records_per_page);

						$query = "SELECT * FROM memorandum ORDER BY memo_date DESC LIMIT $offset, $no_of_records_per_page";
						$counter = 0;
						if ($result = $db->query($query)){
							while ($row = $result->fetch_assoc()){
								$memoNum = $row['memo_number'];
								$memoSeries = $row['memo_series'];
								$memoSubject = $row['memo_subject'];
								$mDate = strtotime($row['memo_date']);
								$memoFilename = $row['memo_filename'];
								$memoDir = $row['memo_filepath'];

								$months = array("null","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
								$memoDate = strtoupper($months[intval(date('m',$mDate))])." ".date('d',$mDate).", ".date('Y',$mDate);
								// $memoDate = $mDate;

								echo "
									<div style=\"padding:2%; border: solid #e3dede 1px; border-radius:1%;\">
						    			<p class=\"h4 text-justify\"><b><a href=\"memorandum_view.php?memoid=".$row['memo_id']."\">".$memoDate." DM ".$memoNum.", S. ".$memoSeries." - ".strtoupper($memoSubject)." </b></a></p>
									
										<p class=\"h5 text-justify\">
											".ucwords(strtolower($memoSubject))."
										</p>
										<p class=\"h5 text-justify\">
											DM ".$memoNum.", s. ".$memoSeries."
										</p>
									</div>
									<br>
								";
							
								$counter = $counter + 1;
							}
							if($counter == 0){
								echo "<p> No uploaded memorandum yet.</p>";
							}
						} else {
							echo "<p> No uploaded memorandum yet.</p>";
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
									echo "<li><a href='?pageno=".($current_page - 1)."'>Previous</a></li>";
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
										echo "<li><a href='?pageno=".$page_num."'>".$page_num."</a></li>";
									}
								}

								// Next button
								if ($current_page >= $total_pages) {
									echo "<li class='disabled'><a href='#'>Next</a></li>";
								} else {
									echo "<li><a href='?pageno=".($current_page + 1)."'>Next</a></li>";
								}
							}
							?>
  						</ul>
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
</html>
