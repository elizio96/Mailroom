<html>
	<head>
	<title>Add Worker</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<?php
		include ("dbConnect.php");

		$studentID=$_GET["studentID"];
		$shift=$_GET["selectShift"];
		$workStudy=$_GET["workStudy"];

		$sqlStatus="SELECT firstName,lastName, classStatus
		FROM Student
		WHERE studentID = '$studentID'";	
		$result = $con->query($sqlStatus) or die('Could not run query: '.$con->error);
		$row = $result->fetch_assoc();
		$FN=$row["firstName"];
		$LN=$row["lastName"];
		$CS=$row["classStatus"];
		
		$sql="INSERT INTO StudentWorker VALUES($studentID, '$FN', '$LN', '$shift', '$workStudy', '$CS');";
		
		if(mysqli_query($con, $sql)){
			echo "<h3>" .$FN. " " .$LN. " successfully a student worker for the Mailroom</h3> <br>
			<a href = 'addWorker.html'>Back to add worker</a>";
		}
		else{
			echo "Aleady a student worker";
			echo "<br><a href = 'addWorker.html'>Back to add worker</a>";
		}
		?>

	</body>
</html>