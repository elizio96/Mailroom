<html>
	<head>
	<title>Searching Complete</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
	<h1>Iona College</h1>
	<table border="0">
	<tr> 
			<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  					
			<th><h1>New Dorm Slip Creation</h1></th> <th><a href = "index.html"> Logout </a></th>
	</tr>
	<tr> 
			 <th><a href = "Menu.html">Menu</a><br>
				Iona College
			</th>  <th>New Dorm Slip Creation<br><br>
	
		<?php
		include ("dbConnect.php");
		$stuWorkerID=$_GET["stuWorkerID"];
		$location=$_GET["location"];
		$wrongLocation=$_GET["wrongLocation"];
		$reasonReturned=$_GET["reasonReturned"];
		$trackNum=$_GET["trackNum"];
		$slipFirstN=$_GET["slipFirstN"];
		$slipLastN=$_GET["slipLastN"];
		$roomNum=$_GET["roomNum"];
		$dateDel=$_GET["dateDel"];
		$pkgType=$_GET["boxSize"];
		$slipNum=rand(0,99999);
		
		$result = $con->query("SELECT slipNum FROM MailServices where slipNum='$slipNum';");
		while ($result-> num_rows > 0) {
			$slipNum=rand(0,99999);
			$result = $con->query("SELECT studenID FROM Student where studentID='$slipNum';");
		  }	
		

		$sqlS="SELECT studentID 
			   FROM Student 
			   WHERE firstName = '$slipFirstN' AND lastName = '$slipLastN' AND location = '$location' 
			   AND roomNum = '$roomNum';";
			$result = $con->query($sqlS) or die('Could not run query: '.$con->error);
			$row = $result->fetch_assoc();
			$SID=$row["studentID"];
			
			$sql="INSERT INTO SLIPS VALUES($slipNum, '$pkgType',$dateDel, NULL,$trackNum, $stuWorkerID, $SID, 'A');";
		
			
			if(mysqli_query($con, $sql)){
				echo "Slip added successfully!! . <br><a href = 'dormSLipCreate.html'>Back to Dorm Slip Creation</a>";
				$sql1="UPDATE MailServices SET slipNum = $slipNum WHERE TrackingNum = $trackNum;";
			}else{
				echo "Error: " . $sql . "<br>" . $con->error;
				echo "<br><a href = 'dormSlipCreate.html'>Back to Dorm Slip Creation</a>";
			}						
		?>
	</body>
</html>