<html>
	<head>
	<title>Student Entry</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<h1>Iona College</h1>
		<table border="0">
		<tr> 
				<th><a href = "http://www.iona.edu"> <img src="photo2.png" alt="text description" width=50></a></th>  
				<th><h1>Student Entry</h1></th> <th><a href = "index.html"> Logout </a></th>
		</tr>
		<tr> 
				 <th><a href = "Menu.html">Menu</a><br>
					Iona College
				</th>  <th>Student Entry<br><br>

	
		<?php
		include ("dbConnect.php");
		
		$firstN=$_GET["firstN"];
		$lastN=$_GET["lastN"];
		$dorm=$_GET["location"];
		$classStatus=$_GET["year"];
		$roomNum=$_GET["roomNum"];
		$floorNum=$_GET["floorNum"];
		$email=$_GET["email"];
		$studentID=rand(0,99999);
		
		$result = $con->query("SELECT studenID FROM Student where studentID='$studentID';");
		while ($result-> num_rows > 0) {
			$studentID=rand(0,99999);
			$result = $con->query("SELECT studenID FROM Student where studentID='$studentID';");
		  }
		
		$sql="INSERT INTO Student VALUES($studentID, '$firstN', '$lastN', '$dorm', '$roomNum', '$classStatus', '$email', $floorNum);";

		if($con->query($sql) == TRUE) {
			echo "Student Added successfully. <br>Students ID: " .$studentID."<br><a href = 'addStudent.html'>Back to Student Entry </a>";
		}
		else{
			echo "Error: " . $sql . "<br>" . $con->error;
			echo "<br><a href = 'addStudent.html'>Back to Student Entry</a>";
		}

		$con->close();		
		?>

	</body>
</html>