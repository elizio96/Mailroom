<html>
	<head>
	<title>Packages</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<?php
		include ("dbConnect.php");
		
		$dorm=$_GET["selectDorm"];
		
		$sql="SELECT S.lastName, S.firstName, count(L.slipNum) AS numPackages
		FROM Student S, slips L
		Where S.studentID = L.studentID and s.location='$dorm' and datePickedUp IS NULL
		Order by S.lastName;";
		
		$result = $con->query($sql) or die('Could not run query: '.$con->error);
		
		if($result -> num_rows > 0){
			echo "<h1>".$dorm." Hall Packages</h1>";
			echo " <table border='1'> ";
			echo "<tr>
						<th> First Name </th>
						<th> Last Name </th>
						<th> Number of Packages </th>

				   </tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>".$row["firstName"]. "</td>
						<td>".$row["lastName"]. "</td>
						<td>".$row["numPackages"]. "</td>
					</tr>";
				}
				echo " </table> ";
				echo "<br><a href = 'Admin.html'>Back to Admin Page</a>";
		}else{
			echo "<h3>No Packages in ".$dorm."</h3";
			echo "<a href = 'Admin.html'>Back to Admin</a>";
		}
		
		?>

	</body>
</html>