<html>
	<head>
	<title>Received Packages</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">

	</head>
	<body>
	<h1>Iona College</h1>
	<table border="0">
	<tr> 
			<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  
			<th><h1>Received Packages</h1></th> <th><a href = "index.html"> Logout </a></th>
	</tr>
	<tr> 
			 <th><a href = "Menu.html">Menu</a><br>
				Iona College
			</th>  <th>Received Packages<br><br>
	
		<?php
		include ("dbConnect.php");
		
		$trackingNum=$_GET["trackingNum"];
		$deliveredFromCarrier=$_GET["deliveredFromCarrier"];
		$Date=$_GET["delFromCarrierDate"];
		$empID=$_GET["empID"];
		$delToDorm=$_GET["delToDorm"];
		
		$sql="INSERT INTO MAILSERVICES 
		      VALUES($trackingNum, '$deliveredFromCarrier', '$Date', '$delToDorm',$empID,NULL,NULL,NULL );";
		
		if ($con->query($sql) == TRUE) {
			echo "    Tracking Number added successfully! . <br><a href = 'rcvdPackages.html'>Back to Received Packages</a>";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
			echo "<br><a href = 'rcvdPackages.html'>Back to Received Packages</a>";
		}

		$con->close();
		
		?>

	</body>
</html>