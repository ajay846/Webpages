<!DOCTYPE html>
<html>
<head>
	<title>Appt Maintainance Record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style type="text/css">
	body, html{				/*Setting to a 0 margin position so that no space is left*/
		margin: 0 auto;
		padding: 0;
	}
	div[id=main_form]{
		height: 600px;
		width: 1000px;
		background-color: skyblue;
	}
	form{
		padding-top: 60px;
	}
	input[id=fname]{
		width: 250px;
		border-left: 0px;
		border-right: 0px;
		border-top: 0px;
		background-color: #9be7fa;
	}
	input[id=lname]{
		width: 250px;
		border-left: 0px;
		border-right: 0px;
		border-top: 0px; 
		border-bottom-color: red;
		background-color: #9be7fa;
	}
	input[id=reciept]{
		width: 250px;
		border-left: 0px;
		border-right: 0px;
		border-top: 0px; 
		border-bottom-color: red;
		background-color: #9be7fa;
	}
	input[id=month_of_registry]{
	}
	input[id=submit_btn]{
		border-radius: 5px;
		border-bottom: 0px;
		border-right: 0px;
		border-top: 0px; 
		border-left: 0px;
		cursor: pointer;
	}
	input[id=submit_btn]:hover{
		border-radius: 5px;
		border-bottom: 0px;
		border-right: 0px;
		border-top: 0px; 
		border-left: 0px;
		cursor: pointer;
		box-shadow: 2px 2px 2px grey;
	}

</style>

<?php

if(isset($_POST['btn'])){
	$dbhost = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "jplf";
			   
	$link = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

	if(!$link){
		echo "Not Connected::ERROR!".mysqli_connect_error()."<br>";
	}
	else{
				
		$fname = mysqli_real_escape_string($link, $_POST['fn']);
		$lname = mysqli_real_escape_string($link, $_POST['ln']);
		$recNum = mysqli_real_escape_string($link, $_POST['rn']);
		$month_num = mysqli_real_escape_string($link, $_POST['monthNum']);
				
		$sql = "insert into maintainance_data(LastName,FirstName,r_num,month) values('$fname','$lname','$recNum','$month_num')";

		if(mysqli_query($link, $sql)){
		    echo "Records added successfully.";
		}
		else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	} 
}

?>

<body>
	<center>
		<div id=main_form>
			<form method="POST" action="#">
				<input type="text" placeholder="First Name" id=fname maxlength="50" required name=fn value="">
				<input type="text" placeholder="Last Name" id=lname maxlength="50" required name="ln" value=""><br>
				<input type="number" maxlength="5" required id="reciept" placeholder="Reciept Number" name="rn" value="">
				<input type="number" min="1" max="12" id=month placeholder="Month" id=month_of_registry name=monthNum value=""><br>
				<input type="submit" value="Submit" id=submit_btn name="btn">
			</form>
		</div>
		<h4>Created By: Uttarkar Sainath</h4>
	</center>

</body>
</html>