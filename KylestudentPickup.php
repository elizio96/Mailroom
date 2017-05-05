<html>
	<head>
	<title>Package Pickup</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">

	</head>
	<body>
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

	
		<?php
		include ("dbConnect.php");
		
		//echo "<br>";
		$slipNum=$_GET["slipNum"];
		$PickUpDate=$_GET["PickUpDate"];
		
		$sql="UPDATE SLIPS SET datePickedUp = '$PickUpDate' WHERE slipNum = $slipNum;";
		 
		if(mysqli_query($con, $sql)){
			echo "    Slip Pick-up Date updated successfully! . <br><a href = 'studentPickup.html'>Back to Student Package Pickup</a>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $con->error;
			echo "<br><a href = 'studentPickup.html'>Back to Student Package Pickup</a>";
		}
		
		//$con->close();
		?>

	</body>
</html>