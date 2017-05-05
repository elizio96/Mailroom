<html>
	<head>
	<title>Dorm Entry</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">

	</head>
	<body>
	<h1>Iona College</h1>
	<table border="0">
	<tr> 
			<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  
			<th><h1>Dorm Entry</h1></th> <th><a href = "index.html"> Logout </a></th>
	</tr>
	<tr> 
			 <th><a href = "Menu.html">Menu</a><br>
				Iona College
			</th>  <th>Dorm Entry<br><br>
	
		<?php
		include ("dbConnect.php");
		
		//echo "<br>";
		$location=$_GET["location"];
		$street=$_GET["street"];
		$city=$_GET["city"];
		$state=$_GET["state"];
		$zip=$_GET["zip"];
		$numFloors=$_GET["numFloors"];
		$numStudents=$_GET["numStudents"];

		$sql="INSERT INTO DORM VALUES('$location', '$street', '$city', '$state', '$zip', '$numFloors', '$numStudents');";
		
		if($con->query($sql) == TRUE) {
			echo "Added successful . <br><a href = 'addDorm.html'>Back to Dorm Entry </a>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $con->error;
			echo "<br><a href = 'addDorm.html'>Back to Dorm Entry</a>";
		}

		$con->close();
		
		?>

	</body>
</html>