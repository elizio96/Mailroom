<html>
	<head>
	<title>Enterence Complete</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<?php
		include ("dbConnect.php");
		$firstN=$_GET["firstN"];
		$lastN=$_GET["lastN"];
		$boxes=$_GET["boxSize"];
		$empID=$_GET["empID"];
		$Tracknum=$_GET["TrackingNum"];
		$dateDelieved=date("m/d/y", $phptime);
		$slipNum=rand(0,99999);
		
		$result = $con->query("SELECT slipNum FROM MailServices where slipNum='$slipNum';");
		while ($result-> num_rows > 0) {
			$slipNum=rand(0,99999);
			$result = $con->query("SELECT studenID FROM Student where studentID='$slipNum';");
		  }
	
		$sqlID="SELECT studentID, roomNum, location
		FROM Student 
		WHERE firstName = '$firstN' and lastName = '$lastN';";
		$result = $con->query($sqlID) or die("Could not run query: ".$con->error);
		$row = $result->fetch_assoc();
		$studentID=$row["studentID"];
		$roomNum=$row["roomNum"];
		$dorm=$row["location"];
		
		$sql="INSERT INTO slips VALUES('$slipNum', '$boxes', '$dateDelieved', NULL, '$Tracknum', '$empID', '$studentID', 'A');";
		$slipNum++;
		if (mysqli_query($con, $sql)){
			echo "Package Logged successfully!<br> Package goes to " .$roomNum;
		}else{
			echo "Error: " .$sql. "<br>" .$con->error. "<br><a href = 'workplace.html'>Back to Work Place</a>";
		}
		?>

	</body>
</html>