<!-- 
	*** README ***
	This .php file is not an actual page but rather a part of the page.
	We created this file so we don't need to manually edit all the pages if we want to update the navigation bar.
	With this, we just need to update a single file.

	Note:
		For future html pages, please don't forget to include this file.

	Usage:
		<html>
			..
			<body>
				< ?php @include=("navigation.php") ? >
				...
			</body>
		</html>
-->

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