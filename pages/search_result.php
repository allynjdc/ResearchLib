<?php
include "../database/db_config.php";
session_start();

$key 	= "";
$date 	= "";
$categ 	= "";
$types	= "";
$agenda = "";
$filters = "";
if (isset($_GET['submit'])){
	$key 	= $_GET['user_search'];
	$date 	= isset($_GET['date'])!="" ?  $_GET['date']: "";
	$categ 	= isset($_GET['categ'])!="" ?  $_GET['categ']: "";
	$types	= isset($_GET['types'])!="" ?  $_GET['types']: "";
	$agenda = isset($_GET['agenda'])!="" ? $_GET['agenda']: "";
}

$filters = $date."".$categ."".$types."".$agenda;

$year = date("Y");

$cyear1 = date("Y-m-d", strtotime("-1 year"));
$year1 = date('Y',strtotime($cyear1));

$cyear2 = date("Y-m-d", strtotime("-4 years"));
$year2 = date('Y',strtotime($cyear2));

// Highlight words in text
function highlightWords($text, $keword) {
	$text = preg_replace('#'. preg_quote($keword) . '#i', '<span style="background-color: #F9F902;">\\0</span>', $text);
	return $text;
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
		  	<div class="row content body_middle" >

			    <div class="col-sm-3 sidenav" >
			    	<div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6">
			    		<br>
			    		<div>
			    			<p><b>Year Published</b></p>
			    			<p><a href="search_result.php?user_search=<?=$key?>&date=<?=$year?>&submit=">Since <?=$year?></a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&date=<?=$year1?>&submit=">Since <?=$year1?></a></p>	
				      		<p><a href="search_result.php?user_search=<?=$key?>&date=<?=$year2?>&submit=">Since <?=$year2?></a></p>
				      		<!-- <p onclick="custYear()"><a>Custom Year</a></p>
				      		<p id="custyear"></p> -->
			    		</div>
			    		<hr>
			    		<div>
			    			<p><b>Research Category</b></p>
			    			<p><a href="search_result.php?user_search=<?=$key?>&categ=National&submit=">National</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&categ=Regional&submit=">Region</a></p>	
				      		<p><a href="search_result.php?user_search=<?=$key?>&categ=<?="Schools Division"?>&submit=">Schools Division</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&categ=District&submit=">District</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&categ=School&submit=">School</a></p>
				      		<br>
				      		<p><a href="search_result.php?user_search=<?=$key?>&types=<?="Action Research"?>&submit=">Action Research</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&types=<?="Basic Research"?>&submit=">Basic Research</a></p>
			    		</div>
			    		<hr>
			    		<div>
			    			<p><b>Research Agenda</b></p>
			    			<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Teaching and Learning"?>&submit=">Teaching & Learning</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Child Protection"?>&submit=">Child Protection</a></p>	
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Human Resource Development"?>&submit=">Human Resource Development</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Governance"?>&submit=">Governance</a></p>
				      		<br>
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="DRRM"?>&submit=">DRRM</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Gender Development"?>&submit=">Gender Development</a></p>	
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Inclusive Education"?>&submit=">Inclusive Education</a></p>
				      		<p><a href="search_result.php?user_search=<?=$key?>&agenda=<?="Others"?>&submit=">Others</a></p>
			    		</div>
				      	
			      	</div>
			    </div>

			    <div class="col-sm-6 center_content">
			    	<br>
			    	<div class="col-md-10 form-row align-items-center" >
						<form action="search_result.php" target="_SELF" method="GET" enctype="multipart/form-data" >
    						<div class="input-group" >
     							<input type="text" class="form-control" value="<?=$key?>" name="user_search" id="user_search" style="height: 40px;">
      							<div class="input-group-btn" >
       								<button class="btn btn-default" type="submit" name="submit" style="height: 40px;"><i class="glyphicon glyphicon-search">&nbsp;</i></button>
      							</div>
    						</div>
 						</form>
					</div>
					<br><br><hr>
					<?php 
						$search_key = "%".$key."%";	
						// if ($filters!=""){
						// 	echo $filters;
						// 	$query = "SELECT * FROM research_output AS ro INNER JOIN research_creation AS rc INNER JOIN research_journal AS rj INNER JOIN researcher as r ON rj.journal_id = ro.research_journal_id AND ro.research_id = rc.creation_research_id AND rc.creation_researcher_id = r.researcher_id WHERE ".$filters." OR (ro.research_keywords LIKE '$search_key' OR ro.research_title LIKE '$search_key' OR ro.research_abstract LIKE '$search_key' OR ro.research_office LIKE '$search_key')";
								
						// } 

						// Get current page number
						$pageno = (isset($_GET["resultpageno"])) ? $_GET["resultpageno"] : 1; // Default is page 1
						
						// Formula for pagination
						$no_of_records_per_page = 10;
						$offset = ($pageno - 1) * $no_of_records_per_page;

						// Get total number of pages
						$total_pages_query = "SELECT COUNT(*) FROM research_output AS ro 
							INNER JOIN research_journal AS rj 
							ON ro.research_journal_id = rj.journal_id
							WHERE rj.journal_title LIKE '$search_key' OR 
									ro.research_title LIKE '$search_key'";

						$result_count = $db->query($total_pages_query);
						$total_rows = mysqli_fetch_array($result_count)[0];
						$total_pages = ceil($total_rows / $no_of_records_per_page);

						$query = "SELECT * FROM research_output AS ro 
							INNER JOIN research_creation AS rc 
							INNER JOIN research_journal AS rj 
							INNER JOIN researcher as r 
							ON rj.journal_id = ro.research_journal_id AND 
								ro.research_id = rc.creation_research_id AND 
								rc.creation_researcher_id = r.researcher_id 
							WHERE (ro.research_keywords LIKE '$search_key' OR 
								ro.research_title LIKE '$search_key' OR 
								ro.research_abstract LIKE '$search_key' OR 
								ro.research_office LIKE '$search_key' OR 
								rj.journal_title LIKE '$search_key' OR 
								r.researcher_last_name LIKE '$search_key' OR 
								r.researcher_first_name LIKE '$search_key') 
							GROUP BY ro.research_title";
							// LIMIT $offset, $no_of_records_per_page";

						$counter = 0;
						
						if ($result = $db->query($query)) {
							while ($row = $result->fetch_assoc()) {
								if ((empty($filters)) OR ($row['research_agenda']==$agenda OR $row['research_type']==$types OR $row['research_category']==$categ OR date('Y',strtotime($row['research_date_publish']))==$date)) {

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
						<p class="h4 text-justify">
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
						<p class="h5 text-justify" style="color: maroon">
							<?php
								$authorList = (empty($data_authors)) ? "Unknown Author" : join(", ", $data_authors);
								$journalTitle = ucwords(strtolower($row['journal_title']));
								$datePublished = date('Y',strtotime($row['journal_date_publish']));
								$sub_text = $authorList." - ".$journalTitle.", ".$datePublished;
								$text_to_display = !empty($key) ? highlightWords($sub_text, $key) : $sub_text;
								echo $text_to_display;
							?> 
						</p>
						<p class="h6 text-justify">
							<?php
								$abstract_text = substr($row['research_abstract'], 0, 270).".....";
								$abstract_to_display = !empty($key) ? highlightWords($abstract_text, $key) : $abstract_text;
								echo $abstract_to_display;
							?>
						</p>
						<p>&nbsp;</p>
						<br>
					</div>

					<?php
								$counter = $counter + 1;
							} // end of inner if condition
						} // end of while loop

						if($counter == 0){
							echo "<p> No results found.</p>";
						}
						
					} else {
						echo "<p> No results found.</p>";
					}
					
					?>

					<!-- <div class="text-right">
						<ul class="pagination pagination-sm ">
						    <li><a href="#">Previous</a></li>
						    <li><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li><a href="#">Next</a></li>
  						</ul>
					</div> -->

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

	<script>
		// FOR CUSTOM YEAR FILTER
		function custYear() {
		  document.getElementById("custyear").innerHTML = "<form><input type='number' name='yearFrom' maxlength='4' pattern='\d{4}'> ??? <input type='number' name='yearTo' maxlength='4' pattern='\d{4}'></form>";
		}
	</script>


	</body>
</html>
