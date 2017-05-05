<html>
	<head>
	<title>Change Dorm</title>
	<link rel="stylesheet" type="text/css" href="sample.css">
	</head>
	<body>
		<?php
		include ("dbConnect.php");
		$studentID=$_GET["studentID"];
		$dorm=$_GET["location"];
		$roomNum=$_GET["roomN"];
		$classStatus=$_GET["year"];

		
		$sql="UPDATE Student 
			  SET LOCATION='$dorm', roomNum='$roomNum', classStatus='$classStatus' 
			  WHERE studentID='$studentID';";
		
		if(mysqli_query($con, $sql)){
			echo "<h3>Student's residence changed successfully<h3><br>
			<a href = 'changeDorm.html'>Back to Change Residence</a>";
		}else{
			echo "Change Failed...<br>" .$con->error;
			echo "<br><a href = 'changeDorm.html'>Try again.</a>";
		}
		
		?>

	</body>
</html>