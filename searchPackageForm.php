<html>
	<head>
	<title>Searching Complete</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<h1>Iona College</h1>
		<table border="0">
		<tr> 
				<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  					<th><h1>Student Packages</h1></th> <th><a href = "index.html"> Logout </a></th>
		</tr>
		<tr> 
				 <th><a href = "Menu.html">Menu</a><br>
					Iona College
				</th>  <th><br><br>

	
		<?php
		include ("dbConnect.php");

		$studentID=$_GET["studentID"];

		$sqlS="SELECT *
		FROM Student s, slips t
		WHERE s.studentID = $studentID and t.studentID=s.studentID 
		ORDER BY t.dateDelivered;";
		
		$result = $con->query($sqlS) or die('Could not run query: '.$con->error);

		if($result -> num_rows > 0){
			echo " <table border='1'> ";
			echo "<tr>
					<th> slip number </th>
					<th> Tpye of Package </th>
					<th> Date Package Delievered </th>
					<th> Date Picked Up </th>
				  </tr>";
			while($row = $result->fetch_assoc()){
				echo "<h2> ".$row['firstName']. " ".$row['lastName']. " Packages sorted by date.</h2>";
				echo "<tr>
					<td>".$row["slipNum"]. "</td>
					<td>".$row["typeofPackage"]. "</td>
					<td>".$row["dateDelivered"]. "</td>
					<td>".$row["datePickedUp"]. "</td>
				</tr>";
			}
			echo " </table> ";
			echo "<br><a href = 'searchPackage.html'>Back to Searching Packages</a>";
		}else{			
			echo "<h2>Sorry, no packages</h2>";
			echo "<br><a href = 'searchPackage.html'>Back to Searching Packages</a>";
			
		}
		?>
	</body>
</html>