<html>
	<head>
	<title>Return Mail</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<h1>Iona College</h1>
		<table border="0">
		<tr> 
				<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  
				<th><h1>Return Mail</h1></th> <th><a href = "index.html"> Logout </a></th>
		</tr>
		<tr> 
				 <th><a href = "Menu.html">Menu</a><br>
					Iona College
				</th>  <th>Return Mail to Mailservices<br><br>

	
		<?php
		include ("dbConnect.php");
		
		//echo "<br>";
		$slipNum=$_GET["slipNum"];
		$dateReturn=$_GET["dateReturn"];
		$reason=$_GET["reasonReturn"];
		
		$sql="UPDATE SLIPS SET pkgStatus = 'R' 
		WHERE slipNum = $slipNum;";
		$sql="UPDATE MAILSERVICES SET dateReturned ='$dateReturn', reasonReturned = '$reason' 
		WHERE slipNum = $slipNum;";
		 
		if(mysqli_query($con, $sql)){
			echo "    Slip Return Mail updated successfully! . <br>
			<a href = 'returnMail.html'>Back to Return Mail</a>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $con->error;
			echo "<br><a href = 'returnMail.html'>Back to Return Mail</a>";
		}
		
		?>

	</body>
</html>