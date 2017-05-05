<html>
	<head>
	<title>Packages</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<?php
		include ("dbConnect.php");
		$box=$_GET["boxSize"];
		
		$sql="SELECT S.lastName, S.firstName, S.studentID, L.slipNum, L.dateDelivered, S.location, L.datePickedUp
		FROM Student S, slips L
		Where S.StudentID = L.studentID and L.typeofPackage='$box'
		Order By datePickedUp and location;";
		
		$result = $con->query($sql) or die('Could not run query: '.$con->error);
		if($result -> num_rows > 0){
			echo "<h1>Students with ".$box. " packages</h1>";
			echo " <table border='1'> ";
				echo "<tr>
						<th> Dorm Name </th>
						<th> Slip # </th>
						<th> studentID </th>
						<th> last Name </th>
						<th> first Name </th>
						<th> Date Delieved </th>
						<th> Picked Up </th>
					  </tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>".$row["location"]. "</td>
						<td>".$row["slipNum"]. "</td>
						<td>".$row["studentID"]. "</td>
						<td>".$row["lastName"]. "</td>
						<td>".$row["firstName"]. "</td>
						<td>".$row["dateDelivered"]. "</td>
						<td>".$row["datePickedUp"]. "</td>

					</tr>";
				}
				echo " </table> ";
				echo "<br><a href = 'Admin.html'>Back to Admin Page</a>";
		}else{
			echo "<h3>No Packages with ".$box. "</h3";
			echo "<br><a href = 'Admin.html'>Back to Admin</a>";
		}
		
		?>

	</body>
</html>