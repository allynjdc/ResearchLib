<?php
include '../database/db_config.php';
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
		<div class="container-fluid text-center">    
		  	<div class="row content">

			    <!-- MIDDLE CONTENT -->
			    <div class="col-sm-12 center-div"> 
                    <h3> This is home page. </h3>
                    <img class="" src="../images/research icon.png" alt="Division Digital Research Library" width="445" height="330">



			    </div>
				<?php
				$query = "SELECT * FROM temp_table";
				if ($result = $db->query($query)) {
					// Fetch associative array
				?>
					<table style="border:1px solid black;">
						<tr>
							<th> index </th>
							<th> Name </th>
						</tr>
				<?php
					while ($row = $result->fetch_assoc()) {
				?>
						<tr>
							<td><?= $row["id"] ?> </td>
							<td><?= $row["name"] ?></td>
						</tr>
				<?php
					}
				?>
					</table>
				<?php
				}
				mysqli_close($db);
				?>
		  </div>
		</div>


		<!-- Footer -->
		<?php 
			@include("footer.php");
		?>


	</body>
</html>
