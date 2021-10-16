<?php
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
			    <div class="navbar-header">
			      	<a class="navbar-brand nav_title_a" href="homepage.php">
			      		<span><img src="../images/logo1.png" height="30px" width="50px"></span>
			      		<!-- <p class="title_brand_nav text-center"> -->
			      			<span class="title_brand_nav"> Division Digital Research Library </span>
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
		  	<div class="row content body_middle" >

			    <div class="col-sm-3 sidenav" >
			    	<div class="col-sm-4" ></div>
			    	<div class="col-sm-8 h6">
			    					      	
			      	</div>
			    </div>

			    <div class="col-sm-6 center_content">
			    	<p>&nbsp;</p>
			    	<div class="text-justify">
						<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AddMemorandumModal" data-whatever="AddMemorandum">
							Add Memorandum
						</button>
					</div>

					<!-- Modal For Add Memorandum -->
					<div class="modal fade text-justify col-sm-12" id="AddMemorandumModal" tabindex="-1" role="dialog" aria-labelledby="AddMemorandumModalLabel" aria-hidden="true">
					    <div class="modal-dialog" role="document">
					    	<div class="modal-content">
					      		<div class="modal-header">
					        		<h5 class="modal-title h3 col-sm-10" id="AddMemorandumModalLabel">Add Memorandum</h5>
					        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
					          			<span aria-hidden="true">&times;</span>
					        		</button>
					      		</div>
					      		<div class="modal-body">
					        		<form>
									    <input id="Memo_user" type="hidden" value="<?= $_SESSION['userid'] ?>" name="Memo_user">
									    <div class="input-group">
									      	<span class="input-group-addon">Memorandum number</span>
									      	<input id="Memo_num" type="number" min="1" max="1000" class="form-control" name="Memo_num" placeholder="DM 000">
									    </div>
									    <br>
									    <input id="Memo_series" type="hidden" min="2010" max="2100" class="form-control" name="Memo_series" value="<?= date("Y") ?>">
									    <div class="input-group">
									      	<span class="input-group-addon">Subject</span>
									      	<input id="Memo_title" type="text" class="form-control" name="Memo_title" placeholder="Memorandum Title">
									    </div>
									    <br>
									    <div class="input-group">
									      	<span class="input-group-addon">Date Signed</span>
									      	<input id="signed_date" type="date" class="form-control" name="signed_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31">
									    </div>
									    <br>
									       	<p class="text-justify">Insert the File:</p>
									      	<input id="Memo_file" type="file" class="" name="Memo_file" accept="image/*, .pdf, .doc, .txt">
									    <br>
					        		</form>
					      		</div>
					      		<div class="modal-footer">
					      			<p id="add_memo_status_msg"></p>
							        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
							        <button type="button" class="btn btn-primary" onclick="addMemo()">Add Memorandum</button>
					      		</div>
					    	</div>
					  	</div>
					</div>


			    	<br>
			    	<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="	UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>
					<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>
					<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>
					<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>
					<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>
					<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>
					<div class="" style="padding:2%; border: solid #e3dede 1px; border-radius:1%;">
			    		<!-- <div class="col-sm-offset-1 col-sm-10"> -->
			    			<p class="h4 text-justify"><b><a href="memorandum_view.php">MAY 11, 2021 DM 284, S. 2021 - VIRTUAL TRAINING ON ADVANCING RESEARCH THROUGH 6D SCHEME FOR SECOND BATCH </b></a></p>
						
							<p class="h5 text-justify">
								Virtual Training on Advancing Research Through 6D Scheme for Second Batch
							</p>
							<p class="h5 text-justify">
								DM 284, s. 2021
							</p>
			    		<!-- </div> -->
			    			<p class="text-right" style="">
								<a href="#UpdateMemorandumModal" data-toggle="modal" data-target="#UpdateMemorandumModal" data-whatever="UpdateMemorandum" style="color: green;">
									update
								</a> 
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="" style="color: red;">remove</a>
							</p>
					</div>
					<br>

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
						
				<!-- Modal For Updated Memorandum -->
				<div class="modal fade text-justify col-sm-12" id="UpdateMemorandumModal" tabindex="-1" role="dialog" aria-labelledby="UpdateMemorandumModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<h5 class="modal-title h3 col-sm-10" id="UpdateMemorandumModalLabel">Update Memorandum</h5>
				        		<button type="button col-sm-2 text-right" class="close" data-dismiss="modal" aria-label="Close">
				          			<span aria-hidden="true">&times;</span>
				        		</button>
				      		</div>
				      		<div class="modal-body">
				        		<form>
								    <div class="input-group">
								      	<span class="input-group-addon">Memorandum Code</span>
								      	<input id="Memo_code" type="text" class="form-control" name="Memo_code" placeholder="DM 000, s. 2021">
								    </div>
								    <br>
								    <div class="input-group">
								      	<span class="input-group-addon">Subject</span>
								      	<input id="title" type="text" class="form-control" name="title" placeholder="Memorandum Title">
								    </div>
								    <br>
								    <div class="input-group">
								      	<span class="input-group-addon">Date Signed</span>
								      	<input id="signed_date" type="date" class="form-control" name="signed_date" placeholder="Additional Info" min="2001-01-01" max="2099-12-31">
								    </div>
								    <br>
								       	<p class="text-justify">Insert the File:</p>
								      	<input id="memo" type="file" class="" name="memo" accept="image/*, .pdf, .doc, .txt">
								    <br>
				        		</form>
				      		</div>
				      		<div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary">Update Memorandum</button>
				      		</div>
				    	</div>
				  	</div>
				</div>


				<div class="col-sm-3 sidenav" >
			    	
			    </div>
		  	</div>
		</div>

		<!-- Footer -->
		<!-- <footer class="container-fluid text-center mt-auto">
  			<p>All rights reserved &copy; 2021</p>
		</footer> -->

	</body>

	<script>
		async function uploadFile() {
			let formData = new FormData();
			var file = document.getElementById('Memo_file').files[0];
			formData.append("file", file);
			const response = await fetch('../database/upload_memo.php', {
								method: "POST",
								body: formData
							});
			// ToDo: Make sure the filename of the image uploaded by user is unique.
			//console.log(response.text());
			if (response.statusText != "OK") {
			//if (response.responseText != "OK") {
				alert("Unable to upload the Memorandum. Reason: " + response.responseText);
				return false;
			}
			return true;
		}

		function addMemo() {
			document.getElementById('add_memo_status_msg').innerHTML = ""; // Reset status message

			var MemoUser = document.getElementById('Memo_user').value;
			var MemoNum = document.getElementById('Memo_num').value;
			var MemoSeries = document.getElementById('Memo_series').value;
			var MemoTitle = document.getElementById('Memo_title').value;
			var MemoSigned = document.getElementById('signed_date').value;
			// Filename is empty in case the user didn't upload any picture or when there's an error during file upload.
			var MemoFile =  (uploadFile())? document.getElementById('Memo_file').files[0].name : ""; 
	
			var data = {'mUser': MemoUser, 'mNum': MemoNum, 'mSeries': MemoSeries, 'mTitle': MemoTitle, 'mSigned': MemoSigned, 'mFile': MemoFile};
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				console.log(this);
				if ((this.readyState == 4) && (this.status == 200)) {
					if (this.responseText == "OK") {
						document.getElementById('AddMemorandumModal').style.display = 'none';
						location.reload();
					} else {
						document.getElementById('add_memo_status_msg').innerHTML = "Unable to add new memorandum. Please try again."+this.responseText;
					}
				}
			};
			xmlhttp.open("POST", "../database/add_memo.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
			xmlhttp.send(JSON.stringify(data));
		}
	</script>

</html>
