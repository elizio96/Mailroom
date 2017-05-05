<html>
	<head>
	<title>Packages</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<?php
		include ("dbConnect.php");
		$dorm=$_GET["selectDorm"];
		
		$sql="SELECT L.studentID, S.firstName, S.lastName, L.typeofPackage, L.dateDelivered, count(L.slipNum) AS Total
		FROM slips L, Student S
		Where S.location='$dorm'
		Order By L.dateDelivered;";
		$result = $con->query($sql) or die('Could not run query: '.$con->error);
		
		if($result -> num_rows > 0){
			echo "<h1>Total packages deleived to ".$dorm. " Hall </h1>";
			echo " <table border='1'> ";
				echo "<tr>
						<th> studentID </th>
						<th> last Name </th>
						<th> first Name </th>
						<th> Package Type </th>
						<th> Date Delivered </th>
					  </tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>".$row["studentID"]. "</td>
						<td>".$row["lastName"]. "</td>
						<td>".$row["firstName"]. "</td>
						<td>".$row["typeofPackage"]. "</td>
						<td>".$row["dateDelivered"]. "</td>

					</tr>";
				}
			echo " </table> ";
			echo "<br><a href = 'Admin.html'>Back to Admin Page</a>";
		}else{
			echo "<h3>No Packages in".$dorm. "</h3";
			echo "<a href = 'Admin.html'>Back to Admin</a>";
		}
		?>

	</body>
</html>