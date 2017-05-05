<html>
	<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="sample.css">

	</head>
	<body>
		<?php
		include ("dbConnect.php");

		$empN=$_POST["lastName"];
		$password=$_POST["[empID"];

			
		$sql = "SELECT lastName, empID  
		FROM studentWorker
		WHERE lastName = '$empN' and empID='$password';";
		
		$result = $con->query($sql) or die('Could not run query: '.$con->error);
		$row = $result->fetch_array();
		
		if($row['lastName'] == ' ' && $row['empID'] == ' '){
			echo "Log in failed!<br>";
			echo "<a href = 'index.html'>Try Again</a>";
		}
		else if($row['lastName'] == $empN && $row['empID'] == $password){
			echo "<h3>Log in complete!<h3><br> Welcome " .$empN;
			echo "<br><a href = 'Menu.html'>Click to access database</a>";
		}
		else{
			echo "Log in failed!<br>";
			echo "<a href = 'index.html'>Try Again</a>";
		}
		?>

	</body>
</html>