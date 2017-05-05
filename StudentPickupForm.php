<html>
	<head>
	<title>Package Pickup</title>
	<link rel="stylesheet" type="text/css" href="sample.css">
		<h1>Iona College</h1>
		<table border="0">
		<tr> 
				<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  
				<th><h1>Student Package Pickup</h1></th> <th><a href = "index.html"> Logout </a></th>
		</tr>
		<tr> 
				 <th><a href = "Menu.html">Menu</a><br>
					Iona College
				</th>  <th>Student Package Pickup<br><br>

	</head>
	<body>
		<?php
		include ("dbConnect.php");

		$slipNum=$_GET["slipN"];
		$studentID=$_GET["[stuId"];
		$date=$_GET["date"];

		$sql="UPDATE slips 
		SET datePickedUp='$date'
		WHERE slipNum='$slipNum' and studentID='$studentID';";
		
		if(mysqli_query($con, $sql)){
			echo "<h3>Package was successfully picked up<h3><br>
			<a href = 'Menu.html'>Back to Menu</a>";
		}else{
			echo "Pickup Failed...<br>" .$con->error;
			echo "<br><a href = 'studentPickup.html'>Try again.</a>";
		}
		?>

	</body>
</html>