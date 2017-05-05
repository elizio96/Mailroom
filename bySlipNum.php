<html>
	<head>
	<title>Searching Complete</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
	<h1>Iona College</h1>
	<table border="0">
	<tr> 
			<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  					<th><h1>Slip Number Lookup</h1></th> <th><a href = "index.html"> Logout </a></th>
	</tr>
	<tr> 
			 <th><a href = "Menu.html">Menu</a><br>
				Iona College
			</th>  <th>Slip Number Lookup<br><br>
	
		<?php
		include ("dbConnect.php");

		$slipNum=$_GET["slipNum"];
		
		
		
		
		$sqlS="SELECT M.trackingNum, M.deliveredFromCarrier, M.delFromCarrierDate, L.datePickedUp, L.slipNum, L.typeofPackage, S.studentID, S.firstName, S.lastName, S.location, S.roomNum, S.email
			   FROM Mailservices M, Slips L, Student S
			   WHERE L.slipNum = '$slipNum' AND L.slipNum = M.slipNum AND L.studentID = S.studentID;";
		$result = $con->query($sqlS) or die('Could not run query: '.$con->error);
		
		if($result -> num_rows > 0){
			echo " <table border='1'> ";
			echo "<tr>
					<th> Slip Number </th>
					<th> Tracking Number </th>
					<th> Carrier </th>
					<th> Date Delivered </th>
					<th> Pickup Date </th>
					<th> Pkg Type </th>
					<th> Student ID </th>
					<th> First </th>
					<th> Last </th>
					<th> Location </th>
					<th> Room# </th>
					<th> Email </th>
				  </tr>";
			
			
			while($row = $result->fetch_assoc()){
				echo "<tr>
					<td>".$row["slipNum"]. "</td>
					<td>".$row["trackingNum"]. "</td>
					<td>".$row["deliveredFromCarrier"]. "</td>
					<td>".$row["delFromCarrierDate"]. "</td>
					<td>".$row["datePickedUp"]. "</td>
					<td>".$row["typeOfPackage"]. "</td>
					<td>".$row["studentID"]. "</td>
					<td>".$row["firstName"]. "</td>
					<td>".$row["lastName"]. "</td>
					<td>".$row["location"]. "</td>
					<td>".$row["roomNum"]. "</td>
					<td>".$row["email"]. "</td>
				</tr>";
				
			}
			echo "<br><a href = 'bySlipNum.html'>Back to Slip Number Lookup</a>";
		}else{			
			echo "<h2>Sorry, no such Slip Number</h2>";
			echo "<br><a href = 'bySlipNum.html'>Back to Slip Number Lookup</a>";
			
		}
		?>
	</body>
</html>