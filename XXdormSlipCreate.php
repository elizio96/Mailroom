<html>
	<head>
	<title>Dorm Slip Creation</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">

	</head>
	<body>
		<h1>Iona College</h1>
		<table border="0">
		<tr> 
				<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  
				<th><h1>Dorm Slip Creation</h1></th> <th><a href = "index.html"> Logout </a></th>
		</tr>
		<tr> 
				 <th><a href = "Menu.html">Menu</a><br>
					Iona College
				</th>  <th>Dorm Slip Creation<br><br>

	
		<?php
		include ("dbConnect.php");
		
		//echo "<br>";
		$stuWorkerID=$_GET["stuWorkerID"];
		$location=$_GET["location"];
		$wrongLocation=$_GET["wrongLocation"];
		$reasonReturned=$_GET["reasonReturned"];
		$trackNum=$_GET["trackNum"];
		$slipNum=$_GET["slipNum"];
		
		$slipFirstN=$_GET["slipFirstN"];
		$slipLastN=$_GET["slipLastN"];
		$roomNum=$_GET["roomNum"];
		$floorNum=$_GET["floor"];
		$dateDel=$_GET["dateDel"];
		$pkgType=$_GET["pkgType"];
		
		//Create Query
		$sqlStatus="SELECT firstName,lastName, classStatus, studentID
		FROM Student
		WHERE firstName = '$slipFirstN' AND lastName = '$sliplastN' AND location = '$location' AND roomNum = '$roomNum'";	
		$result = $con->query($sqlStatus) or die('Could not run query: '.$con->error);
		//$row = $result->fetch_assoc();
		//$FN=$row["firstName"];
		//$LN=$row["lastName"];
		//$CS=$row["classStatus"];
		//$SID=$row["studentID"];
		//$SID = (int) $row['studentID'];
		//echo gettype($FN) . gettype($LN) . gettype($CS) . gettype($SID) . ",<br>";
		 
		
		if($result -> num_rows > 0){
			echo " <table border='1'> ";
			echo "<tr>
					<th> First </th>
					<th> Last </th>
					<th> Status </th>
					<th> Student ID </th>
				  </tr>";
			
			
			while($row = $result->fetch_assoc()){
				echo "<tr>
					<td>".$row["firstName"]. "</td>
					<td>".$row["lastName"]. "</td>
					<td>".$row["classStatus"]. "</td>
					<td>".$row["studentID"]. "</td>
				</tr>";
			}
		
       
		$sql="INSERT INTO SLIPS ('slipNum', typeofPackage,dateDelivered, datePickedUp,'trackingNum','empID','studentID',pkgStatus) VALUES('$slipNum', '$pkgType','$dateDel', NULL,'$trackNum', '$stuWorkerID', '$SID','A');";
		$result = $con->query($sql) or die('Could not run insert: '.$con->error);
		$sql="UPDATE MAILSERVICES M SET M.slipNum = $slipNum WHERE M.TrackingNum = $trackNum;";
		 
		if(mysqli_query($con, $sql)){
			echo "    Slip added successfully!! . <br><a href = 'dormSLipCreate.html'>Back to Dorm Slip Creation</a>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $con->error;
			echo "<br><a href = 'dormSlipCreate.html'>Back to Dorm Slip Creation</a>";
		}
		
		$con->close();
		?>

	</body>
</html>