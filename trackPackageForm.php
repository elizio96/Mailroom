<html>
	<head>
	<title>Searching Complete</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
	<h1>Iona College</h1>
	<table border="0">
	<tr> 
			<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  					<th><h1>Track Packages</h1></th> <th><a href = "index.html"> Logout </a></th>
	</tr>
	<tr> 
			 <th><a href = "Menu.html">Menu</a><br>
				Iona College
			</th>  <th>Track Packages<br><br>
	
		<?php
		include ("dbConnect.php");

		$location=$_GET["location"];
		
		if ($location == "All") {
			$sqlS="SELECT L.trackingNum,L.typeOfPackage,S.location,S.firstName,S.lastName,L.dateDelivered,L.datePickedUp 
			       FROM Dorm D, Slips L, Student S 
			       WHERE D.location = S.location AND S.studentID = L.studentID 
				   ORDER BY S.location, L.datePickedUp, L.dateDelivered;";
		}else {
			$sqlS="SELECT L.trackingNum,L.typeOfPackage,S.location,S.firstName,S.lastName,L.dateDelivered,L.datePickedUp 
			       FROM Dorm D, Slips L, Student S 
			       WHERE D.location = '$location' AND D.location = S.location AND S.studentID = L.studentID 
				   ORDER BY S.location, L.datePickedUp, L.dateDelivered;";
		};	
		
		$result = $con->query($sqlS) or die('Could not run query: '.$con->error);
		if($result -> num_rows > 0){
			echo " <table border='1'> ";
			echo "<tr>
					<th> Tracking number </th>
					<th> Type of Package </th>
					<th> Location </th>
					<th> First </th>
					<th> Last </th>
					<th> Date Delivered </th>
					<th> Pickup Date </th>
				  </tr>";
			
			while($row = $result->fetch_assoc()){
				echo "<tr>
					<td>".$row["trackingNum"]. "</td>
					<td>".$row["typeOfPackage"]. "</td>
					<td>".$row["location"]. "</td>
					<td>".$row["firstName"]. "</td>
					<td>".$row["lastName"]. "</td>
					<td>".$row["dateDelivered"]. "</td>
					<td>".$row["datePickedUp"]. "</td>
				</tr>";
			}
			echo "<br><a href = 'trackPackage.html'>Back to Track Packages</a>";
		}else{			
			echo "<h2>Sorry, no packages</h2>";
			echo "<br><a href = 'trackPackage.html'>Back to Track Packages</a>";
		}
		?>
	</body>
</html>